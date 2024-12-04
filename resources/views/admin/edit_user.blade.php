@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
@include('sweetalert::alert')
<div class="row" style="width:98%; margin:5px;">
    <div class="pagetitle">
        <h1>Edit User</h1>
    </div>

    <div class="col mt-2">
        @if(isset($data_user))
        <form id="updateUserForm" action="{{ route('user.update', $data_user->id_user) }}" method="post" style="max-width:500px" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Ensure we use PUT method for updating -->

            <div class="form-floating mt-2">
                <input type="text" class="form-control" id="floatingInput" name="user" value="{{ $data_user->id_user }}" readonly>
                <label for="floatingInput">Id User</label>
            </div>

            <div class="form-floating mt-1">
                <input type="text" class="form-control" id="floatingname" placeholder="Name" name="name" value="{{ $data_user->nama_user }}" required>
                <label for="floatingname">Name</label>
            </div>

            <div class="form-floating mt-1">
                <input type="text" class="form-control" id="floatingjabatan" placeholder="Jabatan" name="jabatan" value="{{ $data_user->description }}" required>
                <label for="floatingjabatan">Jabatan</label>
            </div>

            <div class="form-floating mt-1">
                <input type="email" class="form-control" id="floatingemail" placeholder="name@email.com" name="email" value="{{ $data_user->email }}" required>
                <label for="floatingemail">Email</label>
            </div>

            <div class="mt-2">
                <div class="row">
                    <div class="col-6">
                        <input type="submit" id="updateUserBtn" class="w-100 btn btn-sm btn-primary" value="Update User" />
                    </div>
                    <div class="col-6">
                        <a href="{{ route('user.create') }}" class="w-100 btn btn-sm btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
        @else
        <p>User not found.</p>
        @endif
    </div>
</div>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    @if(session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
            }).then(function() {
                // Redirect after the alert
                window.location.href = "{{ route('user.create') }}";
            });
    @endif
    });
</script>
@endsection
