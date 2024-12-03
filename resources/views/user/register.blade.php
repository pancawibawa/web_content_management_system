<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS Web App - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('asset/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('asset/js/app.js')}}">
    <link rel="stylesheet" href="{{asset('asset/js/bootstrap.js')}}">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-6 bg-white d-flex justify-content-center align-items-center text-dark">

                <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
                    <div class="text-center">
                        <h4><i class="bi bi-handbag" style="color: red;"></i>SIMS Web App</h4>
                        <h4 class="my-4">
                            Buat akun baru untuk memulai
                        </h4>
                        <form action="/register" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nama Lengkap" required autofocus value="{{ old('name') }}">
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-at"></i></span>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Masukkan password Anda" required>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi password"
                                    required>
                            </div>
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <button class="btn btn-login" type="submit">
                                Daftar
                            </button>
                            <div class="my-2">sudah punya akun? <a href="/login">masuk</a> sekarang
                            
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-6 bg-default d-flex justify-content-center align-items-center text-white">
                <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
                    <div class="text-center">
                        <img src="../asset/Frame 98699.png" alt="" style="max-width: 65%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
