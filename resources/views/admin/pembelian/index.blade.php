@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">🔥 Daftar Pembelian Aplikasi Premium</h4>

    <div class="row">
        @forelse ($pembelians as $pembelian)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0" style="background: linear-gradient(to right, #1f1f1f, #2c2c2c); color: white;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $pembelian->product->name ?? 'Tidak Diketahui' }}</h5>
                        <p class="mb-2">Pembeli: <strong>{{ $pembelian->user->name ?? 'Tidak Diketahui' }}</strong></p>
                        <p class="mb-2">Kontak: <strong>{{ $pembelian->kontak }}</strong></p>
                        <p class="mb-2">Metode: <strong>{{ ucfirst($pembelian->metode_pembayaran) }}</strong></p>
                        <p class="mb-3">Status: <strong>{{ ucfirst($pembelian->status) }}</strong></p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">Belum ada pembelian yang tercatat.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
