<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS web APP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="d-flex">
        @include('layout.sidebar')

        <main class="w-100">
            <div class="d-flex justify-content-between align-items-center px-4 py-3">
                @include('layout.header')
            </div>

            <div class="flex-grow-1 p-4">
                @yield('konten')
            </div>
        </main>

    </div>

    <!-- Scripts DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // Inisialisasi DataTables
        });
    </script>
</body>

</html>
