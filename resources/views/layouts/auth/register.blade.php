@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Form Registrasi</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups! Ada kesalahan input:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama -->
        <div class="form-group mb-3">
            <label for="name">Nama Lengkap</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <!-- Email -->
        <div class="form-group mb-3">
            <label for="email">Alamat Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        </div>

        <!-- Role -->
        <div class="form-group mb-3">
            <label for="role">Peran</label>
            <select name="role" class="form-control" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="pembeli" {{ old('role') == 'pembeli' ? 'selected' : '' }}>Pembeli</option>
            </select>
        </div>

        <!-- Posisi -->
        <div class="form-group mb-3">
            <label for="position_id">Posisi</label>
            <select name="position_id" class="form-control" required>
                <option value="">-- Pilih Posisi --</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}" {{ old('position_id') == $position->id ? 'selected' : '' }}>
                        {{ $position->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Password -->
        <div class="form-group mb-3">
            <label for="password">Kata Sandi</label>
            <input id="password" type="password" class="form-control" name="password" required>
        </div>

        <!-- Konfirmasi Password -->
        <div class="form-group mb-3">
            <label for="password_confirmation">Konfirmasi Kata Sandi</label>
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
        </div>

        <!-- Tombol Daftar -->
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary w-100">
                Daftar
            </button>
        </div>
    </form>
</div>
@endsection
