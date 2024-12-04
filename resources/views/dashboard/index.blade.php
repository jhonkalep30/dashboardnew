@extends('layouts.app')

@section('title', 'Dashboard')

<!-- Include Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@section('content')
<div class="container">
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div>

    <div class="row">
        @foreach ($dashboards as $dashboard)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset('image/icon/' . $dashboard->image) }}" class="card-img-top" alt="{{ $dashboard->title }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $dashboard->title }}</h5>
                    <p class="card-text">{{ $dashboard->deskripsi }}</p>
                    @if(auth()->user()->role === 'User')
                    <a href="{{ route('dashboard.view', $dashboard->id_dashboard) }}" class="btn btn-primary" title="View Dashboard">
                        <i class="fas fa-eye"></i> View Dashboard
                    </a>
                    @endif
                    @if(auth()->user()->role === 'Admin')
                    <a href="{{ route('dashboard.view', $dashboard->id_dashboard) }}" class="btn btn-primary" title="View Dashboard">
                        <i class="fas fa-eye"></i>
                    </a>
                    <!-- Edit Button with Font Awesome Icon -->
                    <a href="{{ route('dashboard.edit', $dashboard->id_dashboard) }}" class="btn btn-secondary" title="Edit Dashboard">
                        <i class="fas fa-edit"></i>
                    </a>
                    <!-- Delete Button with Font Awesome Icon -->
                    <a href="{{ route('dashboard.delete', $dashboard->id_dashboard) }}"
                       class="btn btn-danger" title="Delete Dashboard"
                       onclick="return confirm('Are you sure you want to delete this dashboard?')">
                        <i class="fas fa-trash"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
