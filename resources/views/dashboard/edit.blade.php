@extends('layouts.app')

@section('title', 'Edit Dashboard')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header text-center text-blue">
                    <h1>EDIT DASHBOARD</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.update', $dashboard->id_dashboard) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Id Dashboard -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="id_dashboard" name="id_dashboard" value="{{ $dashboard->id_dashboard }}" readonly>
                            <label for="id_dashboard">ID Dashboard</label>
                        </div>

                        <!-- Title -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $dashboard->title }}" required>
                            <label for="title">Title</label>
                        </div>

                        <!-- Link URL -->
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="link" name="link" placeholder="Link URL" value="{{ $dashboard->link }}" required>
                            <label for="link">Link URL</label>
                        </div>

                        <!-- Description -->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Description" style="height: 100px;" required>{{ $dashboard->deskripsi }}</textarea>
                            <label for="deskripsi">Description</label>
                        </div>

                        <!-- Last Update -->
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="last_update" name="last_update" placeholder="Last Update" value="{{ $dashboard->last_update }}" required>
                            <label for="last_update">Last Update</label>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label for="photo" class="form-label">Dashboard Image</label>
                            <input class="form-control" type="file" id="photo" name="photo">
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-success w-45">Update Dashboard</button>
                            <button type="reset" class="btn btn-secondary w-45">Reset</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('dashboard') }}" class="btn btn-link">Go back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
