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
            <a href="{{route('profil.edit', $profil->id)}}" class="position-absolute bottom-0 start-0 p-2">
                <i class="bi bi-pencil-fill text-dark bg-light rounded-circle p-2"></i>
            </a>
        </div>
        <h1 class="mb-4">{{ Auth::user()->name }}</h1>
        <div class="row mb-3">
            <div class="col-md-8">
                <label for="kategori" class="form-label">Nama Kandidat</label>
                <div class="form-control" id="kategori" name="kategori" value=""><i class="bi bi-at"></i>
                    {{ Auth::user()->name }}</div>
            </div>
            <div class="col-md-4">
                <label for="kategori" class="form-label">Posisi Kandidat</label>
                <div class="form-control" id="kategori" name="kategori" value=""><i class="bi bi-code"></i>
                    {{ Auth::user()->posisi }}</div>
            </div>

        </div>
    </div>
@endsection
