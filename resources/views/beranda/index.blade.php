@extends('layouts.app', ['title' => 'Beranda'])

@section('content')
<div class="container">
    {{-- Banner Sambutan --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="p-4 rounded shadow d-flex justify-content-between align-items-center" style="background-color: #2F80ED; color: white;">
                <div>
                    <h2 class="mb-2">Selamat Datang di Aplikasi Premium</h2>
                    <p>Nikmati kemudahan dan kecepatan pembelian aplikasi premium favorit Anda.</p>
                    <a href="{{ route('beli.index') }}" class="btn btn-light text-primary font-weight-bold mt-2">
                        Beli Sekarang
                    </a>
                </div>
                <div>
                    {{-- Gambar bisa ditambahkan di sini jika perlu --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Produk Premium --}}
    <div class="row mb-4">
        @forelse ($products as $product)
        <div class="col-md-6 mb-3">
            <div class="d-flex align-items-center justify-content-between p-3 shadow rounded bg-white">
                <div class="d-flex align-items-center">
                    {{-- Icon aplikasi (gunakan jika tersedia) --}}
                    <div class="mr-3">
                        <img src="{{ asset('icons/' . strtolower($product->name) . '.png') }}" alt="icon" width="40" onerror="this.style.display='none'">
                    </div>
                    <div>
                        <h5 class="mb-1">{{ $product->name }}</h5>
                        <strong>{{ indonesian_currency($product->price) }}</strong>
                    </div>
                </div>
                <div>
                    <a href="{{ route('beli.form', $product->id) }}" class="btn btn-primary">
                        Beli Sekarang
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <p class="text-muted">Belum ada produk tersedia.</p>
        </div>
        @endforelse
    </div>

    {{-- Keterangan Fitur --}}
    <div class="row text-center">
        <div class="col-md-4 mb-3">
            <h6 class="font-weight-bold">Aplikasi Terpopuler</h6>
            <p class="text-muted">Temukan aplikasi premium yang paling banyak dibeli pengguna.</p>
        </div>
        <div class="col-md-4 mb-3">
            <h6 class="font-weight-bold">Pembelian Terbaru</h6>
            <p class="text-muted">Transaksi pembelian aplikasi premium terbaru dan tercatat.</p>
        </div>
        <div class="col-md-4 mb-3">
            <h6 class="font-weight-bold">Testimoni Pelanggan</h6>
            <p class="text-muted">Testimoni dari pelanggan yang merasakan kemudahan bertransaksi.</p>
        </div>
    </div>
</div>
@endsection
