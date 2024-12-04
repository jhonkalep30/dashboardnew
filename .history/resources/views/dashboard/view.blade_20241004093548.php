@extends('layouts.app')

@section('title', 'Dashboard Detail')

@section('content')
<div class="container">
    <div class="pagetitle">
        <h1>{{ $dashboard->title }}</h1>
        <p>{{ $dashboard->deskripsi }}</p>
        <p>Last Update: {{ $dashboard->last_update }}</p>
        <p>Status: {{ $dashboard->status == '1' ? 'Active' : 'Inactive' }}</p>
    </div>

    <iframe src="{{ $dashboard->link }}" style="width: 100%; height: 700px;"></iframe>
</div>
@endsection
