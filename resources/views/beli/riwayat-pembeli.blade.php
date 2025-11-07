@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">📜 Riwayat Pembelian Anda</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @forelse ($riwayat as $item)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0" style="background: linear-gradient(to right, #1f1f1f, #2c2c2c); color: white;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->paket->name ?? 'Tidak Diketahui' }}</h5>
                        <p>Harga: Rp{{ number_format($item->paket->price ?? 0, 0, ',', '.') }}</p>
                        <p>Metode: {{ ucfirst($item->metode_pembayaran) }}</p>
                        <p>Status: <strong>{{ ucfirst($item->status) }}</strong></p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning">Belum ada riwayat pembelian.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
