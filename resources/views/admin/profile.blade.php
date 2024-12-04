@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="pagetitle">
    <h1>Profile</h1>
</div><!-- End Page Title -->

<section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <ion-icon name="person-sharp" style="font-size: 150px;"></ion-icon> <!-- Corrected icon tag -->
                    <h2>{{ Auth::user()->nama_user }}</h2>
                    <h3>{{ $user->email }}</h3>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title">Profile Details</h5>

                            <!-- Name -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Name</div>
                                <div class="col-lg-9 col-md-8">{{ Auth::user()->nama_user }}</div>
                            </div>

                            <!-- ID (from master_user) -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">ID</div>
                                <div class="col-lg-9 col-md-8">{{ Auth::user()->id_user }}</div>
                            </div>

                            <!-- Company (example field, you can replace or remove this) -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Company</div>
                                <div class="col-lg-9 col-md-8">Kimia Farma</div>
                            </div>

                            <!-- Role (from master_user) -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Role</div>
                                <div class="col-lg-9 col-md-8">{{ Auth::user()->role }}</div>
                            </div>

                            <!-- Phone (example, add phone field to master_user if needed) -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Deskripsi</div>
                                <div class="col-lg-9 col-md-8">{{ Auth::user()->description }}</div>
                            </div>

                            <!-- Email -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                            </div>
                        </div>
                    </div><!-- End Bordered Tabs -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


