@extends('layouts.app', [
'title' => 'Halaman Detail Klien'
])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card px-3 py-3">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <label for="name">Nama Klien</label>
                        <input type="text" class="form-control" value="{{ $client->name }}" disabled>
                    </div>
                </div>

                
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="internet_package_name">Nama Paket Premium</label>
                            <input type="text" class="form-control" value="{{ $client->internet_package->name }}"
                                disabled>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="internet_package_price">Harga Paket Premium</label>
                            <input type="text" class="form-control"
                                value="{{ indonesian_currency($client->internet_package->price) }}" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone_number">Nomor Handphone</label>
                        <input type="text" class="form-control" value="{{ $client->phone_number }}" disabled>
                    </div>
                </div>



            <div class="row">
                <div class="form-group mt-4 d-flex" style="margin-left: 12px;">
                    <a href="{{ route('klien.index') }}" class="btn btn-secondary me-2">Kembali</a>
                    <a href="{{ route('klien.edit', $client->id) }}" class="btn btn-success">Ubah</a>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('js')
    @include('clients.script')
    @endpush