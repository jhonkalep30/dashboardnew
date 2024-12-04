@extends('layouts.app')

@section('title', 'KFLK Web Dashboard')

@section('content')
<div class="pagetitle">
    <h1>Home</h1>
</div><!-- End Page Title -->

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </div>
</div>

<div class="row" style="width:98%; margin:5px;">
    <div class="p-2 bg-light border-top border-bottom border-secondary text-center">
        HOME
    </div>

    @php
    $year = request()->get('year') ?? date('Y');
    $user = Auth::user();
    @endphp

    @if($user->masterUser->role === 'Admin')
    @php
    $dashboards = \App\Models\DataDashboard::where('year', $year)
    ->orderBy('id_dashboard', 'asc')
    ->get();
    @endphp
    @else
    @php
    $dashboards = \App\Models\DataDashboard::join('data_otorisasi', 'data_dashboard.id_dashboard', '=', 'data_otorisasi.id_dashboard')
    ->where('data_dashboard.year', $year)
    ->where('data_dashboard.status', '1')
    ->where('data_otorisasi.id_user', $user->masterUser->id_user)
    ->orderBy('data_dashboard.id_dashboard', 'asc')
    ->get();
    @endphp
    @endif

    @foreach($dashboards as $dashboard)
    @php
    $today = strtotime(date("Y-m-d"));
    $year_now = date("Y");
    $last_update = strtotime($dashboard->last_update);
    $days_difference = ($today - $last_update) / 86400; // Convert seconds to days

    if($days_difference > 40) {
    $bg = 'danger';
    } elseif($days_difference > 29) {
    $bg = 'warning';
    } else {
    $bg = 'success';
    }
    @endphp

    <div class="card" style="width: 18rem; margin:10px;">
        <img src="{{ asset('image/icon/' . $dashboard->image) }}" width="100%" height="220px" />
        <div class="card-body" style="margin-top:-50px">
                <span class="badge bg-{{ $bg }}">
                    <i class="bx bx-calendar icon"></i>
                    Update: {{ $dashboard->last_update }}
                </span>
            <hr class="dropdown-divider" />
            <h5 class="card-title">{{ $dashboard->title }}</h5>
            <p class="card-text">{{ $dashboard->deskripsi }}</p>

            @if($user->masterUser->role === 'Admin')
            <a href="{{ route('dashboard.view', $dashboard->id_dashboard) }}" class="btn btn-primary" title="View">
                <i class="bx bx-show-alt icon"></i> View
            </a>

            <a href="{{ route('dashboard.delete', $dashboard->id_dashboard) }}" class="btn btn-danger"
               onclick="return confirm('Do you really want to delete the dashboard?')" title="Delete">
                <i class="bx bx-trash-alt icon"></i> Delete
            </a>

            <a href="{{ route('dashboard.edit', $dashboard->id_dashboard) }}" class="btn btn-secondary" title="Edit">
                <i class="bx bx-edit icon"></i> Edit
            </a>
            @else
            <a href="{{ route('dashboard.view', $dashboard->id_dashboard) }}" class="btn btn-primary">
                <i class="bx bx-show-alt icon"></i> View Dashboard
            </a>
            @endif
        </div>
    </div>
    @endforeach
</div>

@if(request()->get('id'))
@php
$id_dashboard = request()->get('id');
$dashboard = \App\Models\DataDashboard::find($id_dashboard);
@endphp

@if($dashboard)
<iframe src="{{ $dashboard->link }}" style="position: fixed; width: 100%; height: 100%"></iframe>
@endif
@endif
@endsection
