@extends('layouts.app')

@section('title', 'Input User')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@section('content')

<div class="container mt-4">
    <!-- Input User Section -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="pagetitle text-center">
                <h1>Input User</h1>
            </div>

            <div class="card shadow-sm mt-3">
                <div class="card-body">
                    <form action="{{ isset($data_user) ? route('user.update', $data_user->id_user) : route('user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($data_user))
                        @method('PUT')
                        @endif

                        <div class="form-floating mt-2">
                            <input type="text" class="form-control" id="floatingInput" name="user" value="{{ $data_user->id_user ?? $id }}" readonly>
                            <label for="floatingInput">Id User</label>
                        </div>

                        <div class="form-floating mt-3">
                            <input type="text" class="form-control" id="floatingname" placeholder="Name" name="name" value="{{ $data_user->nama_user ?? '' }}" required>
                            <label for="floatingname">Name</label>
                        </div>

                        <div class="form-floating mt-3">
                            <input type="text" class="form-control" id="floatingjabatan" placeholder="Jabatan" name="jabatan" value="{{ $data_user->description ?? '' }}" required>
                            <label for="floatingjabatan">Jabatan</label>
                        </div>

                        <div class="form-floating mt-3">
                            <input type="email" class="form-control" id="floatingemail" placeholder="name@email.com" name="email" value="{{ $data_user->email ?? '' }}" required>
                            <label for="floatingemail">Email</label>
                        </div>

                        <div class="mt-4 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary w-45">Save</button>
                            <button type="reset" class="btn btn-secondary w-45">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Data User Section -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="pagetitle text-center">
                <h1>Data User</h1>
            </div>

            <div class="table-responsive mt-3">
                <table id="standar_table" class="table table-bordered table-hover text-center" style="font-size: 12px;">
                    <thead class="bg-light">
                    <tr>
                        <th>ID User</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Integritas</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id_user }}</td>
                        <td>{{ $user->nama_user }}</td>
                        <td>{{ $user->description }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            @if($user->status == '1')
                            <i class="fas fa-check-circle text-success"></i>
                            @else
                            <i class="fas fa-times-circle text-danger"></i>
                            @endif
                        </td>
                        <td>
                            @if($user->integritas == '1')
                            <i class="fas fa-check-circle text-success"></i>
                            @else
                            <i class="fas fa-times-circle text-danger"></i>
                            @endif
                        </td>
                        <td>
                            <!-- Delete Form -->
                            <form action="{{ route('user.delete', $user->id_user) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                            <!-- Edit Link -->
                            <a href="{{ route('user.edit', $user->id_user) }}" class="btn btn-sm btn-warning" title="Edit User">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <a href="{{ route('user.reset-password', $user->id_user) }}" onclick="return confirm('Are you sure you want to reset password?')" class="btn btn-sm btn-primary" title="Reset Password">
                                <i class="fas fa-user-lock"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
