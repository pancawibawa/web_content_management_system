<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS web APP</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-6 bg-white d-flex justify-content-center align-items-center text-dark">

                <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
                    <div class="text-center">
                        <h4><img src="../asset/Handbag.png" alt="tas" class="image-red mx-2 pb-2"
                                style="width: 30px">SIMS Web App</h4>
                        <h4 class="my-4">
                            Masuk atau buat akun <br> untuk memulai
                        </h4>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                            <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password"
                                placeholder="masukan password anda" aria-label="Username"
                                aria-describedby="basic-addon1">
                            <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <div class="btn-primary">
                            Masuk
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-6 bg-default d-flex justify-content-center align-items-center text-white">
                Kolom Kanan
            </div>
        </div>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script>
        const password = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");
        togglePassword.addEventListener("click", function() {
            const type = password.type === "password" ? "text" : "password";
            password.type = type;
            this.innerHTML = type === "password" ? '<i class="fas fa-eye"></i>' :
            '<i class="fas fa-eye-slash"></i>';
        });
    </script>
</body>

</html>
