<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS web APP</title>
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
                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                
                            </div>
                        @endif
                        <h4><i class="bi bi-handbag" style="color: red;"></i>SIMS Web App</h4>
                        <h4 class="my-4">
                            Masuk atau buat akun <br> untuk memulai
                        </h4>
                        <form action="/login" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-at"></i></span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Masukkan email Anda" autofocus required>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Masukkan password Anda" required>
                                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                    <i class="bi bi-eye"></i>
                                </span>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <button class="btn btn-login">
                                Masuk
                            </button>
                        </form>
                        <div class="my-2">belum punya akun? <a href="/register">buat akun</a> sekarang

                        </div>
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

    <script>
        const password = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");
        togglePassword.addEventListener("click", function() {
            const type = password.type === "password" ? "text" : "password";
            password.type = type;
            this.innerHTML = type === "password" ? '<i class="bi bi-eye"></i>' :
                '<i class="bi bi-eye-slash"></i>';
        });
    </script>
</body>

</html>
