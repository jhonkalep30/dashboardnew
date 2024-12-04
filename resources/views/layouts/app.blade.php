<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:title" content="KF Laboratorium & Klinik Web Dashboard" />
    <meta property="og:description" content="Akses Dashboard Power BI KFLK" />
    <meta property="og:image" content="{{ asset('image/logo.jpg') }}" />
    <link rel="icon" href="{{ asset('image/logo.jpg') }}">
    <title>@yield('title', 'KFLK Web Dashboard')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom CSS to make the footer sticky -->
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
    </style>
</head>

<body>
<!-- Logout Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda Yakin Logout?
            </div>
            <div class="modal-footer">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Header -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            <img src="{{ asset('image/logo.jpg') }}" alt="">
            <span class="d-none d-lg-block">KFD</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <span class="d-none d-md-block dropdown-toggle ps-2" style="border: 3px solid #ccc; padding: 5px; border-radius: 5px;">
                            Halo, {{ Auth::user()->nama_user }}
                        </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->nama_user }}</h6>
                        <span>{{ Auth::user()->email }}</span>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.edit') }}">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('faq') }}">
                            <i class="bi bi-question-circle"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header><!-- End Header -->

<!-- Sidebar -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        @if(Auth::check() && optional(Auth::user())->role === 'Admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Admin</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('dashboard.create') }}">
                        <i class="bi bi-circle"></i><span>Input Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.create') }}">
                        <i class="bi bi-circle"></i><span>Input User</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('otorisasi.create') }}">
                        <i class="bi bi-circle"></i><span>Input Otorisasi</span>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        @if(Auth::check() && optional(Auth::user())->role === 'User')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @endif
        <li class="nav-heading">Account</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('profile.edit') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('contact') }}">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li>
    </ul>
</aside><!-- End Sidebar -->

<!-- Main Content -->
<main id="main" class="main">
    @yield('content')
</main><!-- End Main -->

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<!-- Footer -->
<footer id="footer" class="footer bg-light">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                    <span>
                        Kimia Farma Laboratorium & Klinik, Information & Technology &copy; <strong> 2024</strong>
                    </span>
            </div>
        </div>
    </div>
</footer><!-- End Footer -->

<!-- Back to top button -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>

<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

@section('scripts')
</body>

</html>
