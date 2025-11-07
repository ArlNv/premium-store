@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Konfirmasi Pembelian</h2>
    <div class="alert alert-success">
        Pesanan Anda berhasil dikirim! Silakan tunggu konfirmasi dari admin.
    </div>
    <a href="{{ route('riwayat.beli') }}" class="btn btn-primary">Lihat Riwayat Pembelian</a>
</div>
@endsection
