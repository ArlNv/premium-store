@extends('layouts.app')

@section('content')
<h2>Riwayat Semua Pembelian</h2>

<table class="table">
    <thead>
        <tr>
            <th>Nama Pembeli</th>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($riwayat as $item)
        <tr>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->paket->nama_paket }}</td>
            <td>Rp{{ number_format($item->paket->harga) }}</td>
            <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
