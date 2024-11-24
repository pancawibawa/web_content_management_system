@extends('layout.app')

@section('konten')
    <div class="text-dark p-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-left mb-4 position-relative">
            @if (Auth::user()->image)
                <img src="{{ asset('images/' . Auth::user()->image) }}" alt="Foto Profil" class="rounded-circle bg-warning"
                    width="120" height="120">
            @else
                <img src="{{ asset('asset/User.png') }}" alt="Foto Profil" class="rounded-circle bg-warning" width="120"
                    height="120">
            @endif

            <!-- Ikon Pencil di pojok kiri bawah -->
            <a href="{{ route('profil.edit', $profil->id) }}" class="position-absolute bottom-0 start-0 p-2">
                <i class="bi bi-pencil-fill text-dark bg-light rounded-circle p-2"></i>
            </a>
        </div>

        <h1 class="mb-4">{{ $profil->name }}</h1>

        <!-- Form untuk mengedit profil -->
        <form action="{{ route('profil.update', $profil->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-8">
                    <label for="name" class="form-label">Nama Kandidat</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $profil->name) }}">
                </div>
                <div class="col-md-4">
                    <label for="posisi" class="form-label">Posisi Kandidat</label>
                    <input type="text" class="form-control" id="posisi" name="posisi" value="{{ old('posisi', $profil->posisi) }}">
                </div>
                @error('posisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Foto Profil</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Profil</button>
        </form>
    </div>
@endsection
