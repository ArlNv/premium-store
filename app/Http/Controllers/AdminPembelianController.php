<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian; 
use Illuminate\Support\Facades\Auth;

class AdminPembelianController extends Controller
{
    public function index()
    {
        // Ambil semua data pembelian
        $pembelians = Pembelian::with('user', 'product')->get();

        // Kirim ke view
        return view('admin.pembelian.index', compact('pembelians'));
    }
}
