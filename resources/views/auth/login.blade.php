@extends('layouts.guest')

@section('content')
<div class="card mb-3">
    <div class="card-body">
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Sign In — KFLK Web Dashboard</h5>
        </div>

        <form method="POST" action="{{ route('login') }}" class="row g-3">
            @csrf
            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <div class="input-group has-validation">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
            </div>

            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Login</button>
            </div>

            {{-- <div class="col-12">
                <p class="small mb-0">Don't have an account? <a href="{{ route('register') }}">Create an account</a></p>
            </div> --}}
        </form>
    </div>
</div>

@if (session('alert.config'))
<script>
    swal({
        title: "{{ session('alert.title') }}",
        text: "{{ session('alert.text') }}",
        icon: "{{ session('alert.icon') }}",
    }).then(function() {
        // Redirect to the dashboard after clicking OK on SweetAlert
        window.location.href = "{{ route('dashboard') }}";
    });
</script>
@endif
@endsection

@yield('styles')
