<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InternetPackage;

class BerandaController extends Controller
{
    public function index()
    {
        $products = InternetPackage::all(); // Ambil semua data produk
        return view('beranda.index', compact('products'));
    }
}
