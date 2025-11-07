@extends('layouts.app', [
'title' => 'Halaman Ubah Klien'
])

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('components.alert-message')
        <div class="card px-3 py-3">
            <form action="{{ route('klien.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="form-group">
                            <label for="name">Nama Klien</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" value="{{ $client->name
                             }}" placeholder="Masukkan nama klien" autofocus>
                            @error('name')
                            <small
                                class="d-block font-weight-bold invalid-feedback">{{ $errors->first('name') }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <div class="form-group">
                            <label for="internet_package_id">Paket Premium</label>
                            <select class="form-control @error('internet_package_id') is-invalid @enderror selectize"
                                name="internet_package_id" id="internet_package_id">
                                <option></option>
                                @foreach ($internet_packages as $internet_package)
                                <option value="{{ $internet_package->id }}"
                                    {{ $internet_package->id === $client->internet_package_id ? 'selected' : '' }}>
                                    {{ $internet_package->name }} - {{ indonesian_currency($internet_package->price) }}
                                </option>
                                @endforeach
                            </select>
                            @error('internet_package_id')
                            <small
                                class="d-block font-weight-bold invalid-feedback">{{ $errors->first('internet_package_id') }}</small>
                            @enderror
                        </div>
                    </div>

                    
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Nomor Handphone</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                name="phone_number" id="phone_number" value="{{ $client->phone_number }}"
                                placeholder="Masukkan nomor handphone">
                            @error('phone_number')
                            <small
                                class="d-block font-weight-bold invalid-feedback">{{ $errors->first('phone_number') }}</small>
                            @enderror
                        </div>

                <a href="{{ route('klien.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
@include('clients.script')
@endpush