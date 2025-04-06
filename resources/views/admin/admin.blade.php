<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Optional: Add your own custom styles if needed -->
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar & Sidebar -->
        @include('admin.includes.navbar')
        @include('admin.includes.sidebar')

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                @yield('content-header')
            </div>

            <div class="content">
                @yield('content')
            </div>
        </div>

        <!-- Footer -->
        @include('admin.includes.footer')
    </div>

    <!-- AdminLTE JS -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    <!-- Optional: Add your custom JS if needed -->
    @yield('scripts')
</body>
</html>
