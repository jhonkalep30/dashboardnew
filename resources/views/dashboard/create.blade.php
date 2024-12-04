@extends('layouts.app')

@section('title', 'Create Dashboard')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header text-center text-blue">
                    <h1>Create Dashboard</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('dashboard.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
                            <label for="title">Title</label>
                        </div>

                        <!-- Link URL -->
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="link" name="link" placeholder="Link URL" required>
                            <label for="link">Link URL</label>
                        </div>

                        <!-- Description -->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Description" style="height: 100px;" required></textarea>
                            <label for="deskripsi">Description</label>
                        </div>

                        <!-- Last Update -->
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="last_update" name="last_update" placeholder="Last Update" required>
                            <label for="last_update">Last Update</label>
                        </div>

                        <!-- Year -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="year" name="year" placeholder="Year" required>
                            <label for="year">Year</label>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <label for="photo" class="form-label">Dashboard Image</label>
                            <input class="form-control" type="file" id="photo" name="photo" required>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-primary w-45">Save Dashboard</button>
                            <button type="reset" class="btn btn-secondary w-45">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
