@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Otorisasi Management</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID User</th>
            <th>ID Dashboard</th>
        </tr>
        </thead>
        <tbody>
        @foreach($otorisasi as $item)
        <tr>
            <td>{{ $item->user->id }}</td>
            <td>{{ $item->dashboard->id }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
