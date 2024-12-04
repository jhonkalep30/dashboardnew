@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="pagetitle">
    <h1>Contact Us</h1>
</div><!-- End Page Title -->

<section class="section contact">
    <div class="container">
        <div class="row gy-4">
            <!-- Contact Info Boxes -->
            <div class="col-xl-6">
                <div class="row">
                    <!-- Address -->
                    <div class="col-md-6">
                        <div class="info-box card shadow-sm h-100">
                            <i class="bi bi-geo-alt text-primary"></i>
                            <h3 class="mt-3">Address</h3>
                            <p>Jl. Talang Betutu No.5, Kec. Tanah Abang,<br>Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta</p>
                        </div>
                    </div>
                    <!-- Call Us -->
                    <div class="col-md-6">
                        <div class="info-box card shadow-sm h-100">
                            <i class="bi bi-telephone text-success"></i>
                            <h3 class="mt-3">Call Us</h3>
                            <p>1-500-255</p>
                        </div>
                    </div>
                    <!-- Email Us -->
                    <div class="col-md-6">
                        <div class="info-box card shadow-sm h-100">
                            <i class="bi bi-envelope text-warning"></i>
                            <h3 class="mt-3">Email Us</h3>
                            <p>corcom@labkimiafarma.id</p>
                        </div>
                    </div>
                    <!-- Open Hours -->
                    <div class="col-md-6">
                        <div class="info-box card shadow-sm h-100">
                            <i class="bi bi-clock text-info"></i>
                            <h3 class="mt-3">Open Hours</h3>
                            <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                        </div>
                    </div>
                </div>
            </div><!-- End col-xl-6 -->
        </div><!-- End row -->
    </div><!-- End container -->
</section><!-- End section.contact -->
@endsection
