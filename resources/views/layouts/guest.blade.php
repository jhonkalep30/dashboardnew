<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta property="og:title" content="KF Laboratorium & Klinik Web Dashboard" />
    <meta property="og:description" content="Akses Dashboard Power BI KFLK" />
    <meta property="og:image" content="{{ asset('image/logo.jpg') }}" />
    <link rel="icon" href="{{ asset('image/logo.jpg') }}">

    <title>KFLK Login</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- Custom Stylesheets -->
    <link href="{{ asset('style/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/login.css') }}" rel="stylesheet">

    <!-- Sweet Alert -->
    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>

    <!-- Google ReCaptcha -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

    @yield('styles')
</head>

<body>

@if (session('error'))
<script>
    swal({
        title: "Gagal",
        text: "{{ session('error') }}",
        icon: "error"
    });
</script>
@endif

@if (session('success'))
<script>
    swal({
        title: "Berhasil",
        text: "{{ session('success') }}",
        icon: "success"
    });
</script>
@endif

<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <img src="{{ asset('image/bg-login-img.png') }}" alt="Background Image" class="img-fluid mt-2">
                    </div>
                    <div class="col-md-6 contents">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <img src="{{ asset('image/logo.png') }}" alt="Logo" class="img-fluid" width="150" height="80">

                                @yield('content')

                                <span class="d-block text-left my-4 text-muted">
                                    Kimia Farma Laboratorium & Klinik, Information & Technology ©2024
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<!-- Vendor JS Files -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

@stack('scripts')
</body>
</html>
