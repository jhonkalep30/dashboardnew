@extends('layouts.app')

@section('title', 'Pakta Integritas')

@section('content')
<div class="container my-5">
    <!-- Card for Pakta Integritas -->
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-body text-center">
            <!-- Image Section -->
            <div class="mb-4">
                <img src="{{ asset('image/bg-login-img.png') }}" alt="Image" class="img-fluid" style="max-width: 200px;">
            </div>
            <!-- Title Section -->
            <h2 class="card-title mb-4">Pakta Integritas Dalam Menjaga Kerahasiaan Data Perusahaan</h2>
            <hr class="my-4">

            <!-- Description List Section -->
            <div class="text-start">
                <p>1. Tunduk dan patuh kepada seluruh ketentuan terkait pengelolaan Web Dashboard Kimia Farma Laboratorium & Klinik</p>
                <p>2. Tidak menyalin, memperbanyak, atau menyebarluaskan data perusahaan untuk tujuan apapun di luar tugas dan tanggung jawab</p>
                <p>3. Apabila terbukti bahwa saya melakukan pelanggaran atas perihal yang telah dinyatakan dalam Pakta Integritas ini, maka saya bersedia dikenakan sanksi sesuai dengan ketentuan/peraturan yang berlaku.</p>
            </div>

            <hr class="my-4">

            <!-- Form Section -->
            <form action="{{ route('dashboard.saveIntegrity') }}" method="POST">
                @csrf
                <div class="form-check form-switch text-start mb-3">
                    <input class="form-check-input" type="checkbox" name="integrity" id="integrity" value="1" required>
                    <label class="form-check-label" for="integrity">Saya Setuju</label>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="bx bx-save icon"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
