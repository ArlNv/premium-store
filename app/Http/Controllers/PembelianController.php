<?php

namespace App\Http\Controllers;

use App\Models\InternetPackage; // Ganti Product ke InternetPackage
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
        $pembelians = Pembelian::with('user', 'product')->latest()->get();
        return view('admin.pembelian.index', compact('pembelians'));
    }

        $products = InternetPackage::all(); 
        $title = "Pilih Aplikasi Premium";
        $pembelians = Pembelian::with('paket')->latest()->get();
    
        return view('beli.index', compact('products', 'title'));
    }

    // Menampilkan form pembelian
    public function form($id)
    {
        $product = InternetPackage::findOrFail($id); 
        $title = "Form Pembelian Aplikasi Premium";

        return view('beli.form', compact('product', 'title'));
    }

    // Menyimpan data pembelian
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:internet_packages,id',
            'kontak' => 'required|string|max:50',
            'metode_pembayaran' => 'required|string|in:dana,gopay,transfer',
        ]);

        $user = Auth::user();
        $pembelian = Pembelian::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'kontak' => $request->kontak,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status' => 'pending',
        ]);

        $product = InternetPackage::find($request->product_id);
        if (is_null($product->price)) {
    return back()->with('error', 'Harga produk tidak ditemukan. Hubungi admin.');
}

    // Buat entri client
        $client = \App\Models\Client::create([
        'user_id' => Auth::id(),
        'internet_package_id'    => $request->product_id,
        'name' => Auth::user()->name,
        'phone_number' => $request->kontak,
        
    ]);

        \App\Models\Transaction::create([
        'user_id' => Auth::id(),
        'client_id' => $client->id,
        'day' => now()->format('d'),
        'month' => now()->format('m'),
        'year' => now()->format('Y'),
        'amount' => $product->price,
        'status' => 'pending',
        'keterangan' => 'Tagihan dari pembelian aplikasi',
    ]);

        return redirect()->route('beli.konfirmasi', $pembelian->id);

        return redirect()->route('beli.index')->with('success', 'Pembelian berhasil dikirim!');

        return redirect()->route('beli.riwayat')->with('success', 'Pesanan berhasil, silakan cek riwayat!');
    }
    public function riwayatPembeli()
    {
        $riwayat = Pembelian::where('user_id', auth()->id())->with('paket')->latest()->get();
        return view('beli.riwayat-pembeli', compact('riwayat'));
    }

    public function riwayatAdmin()
    {
        $riwayat = Pembelian::with('paket', 'user')->latest()->get();
        return view('pembelian.riwayat-admin', compact('riwayat'));
    }

    public function konfirmasi($id)
    {
    $pembelian = Pembelian::with('user', 'product')->findOrFail($id);
    return view('beli.konfirmasi', compact('pembelian'));
    }

}
