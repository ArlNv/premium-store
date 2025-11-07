@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">🔥 Aplikasi Premium Tersedia</h4>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0" style="background: linear-gradient(to right, #2f52c5, #2f52c5); color: white;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="mb-3">Harga: <strong>Rp{{ number_format($product->price, 0, ',', '.') }}</strong></p>
                    <a href="{{ route('beli.form', $product->id) }}" class="btn w-100"
                        style="background-color: white; color: #2f52c5; font-weight: bold; border-radius: 6px;">
                        Beli Sekarang
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection