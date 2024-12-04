@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Input Otorisasi Dashboard Title -->
    <div class="row justify-content-center" style="margin:5px;">
        <div class="col-12">
            <div class="pagetitle text-center">
                <h1>Input Otorisasi Dashboard</h1>
            </div>
        </div>

        <!-- Form Column -->
        <div class="col-lg-6 col-md-8 col-sm-12 mt-5">
            <!-- Display Success Message -->
            @if (session('success'))
            <div class="alert alert-success w-100">
                {{ session('success') }}
            </div>
            @endif

            <!-- Display Validation Errors -->
            @if ($errors->any())
            <div class="alert alert-danger w-100">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Form -->
            <form action="{{ route('otorisasi.store') }}" method="POST">
                @csrf
                <!-- User Input -->
                <div class="mt-2">
                    <div class="mb-3 row">
                        <label for="userlist" class="col-sm-3 col-form-label text-start">User</label>
                        <div class="col-sm-9">
                            <input class="form-control" list="datalistOptions" id="userlist" name="user" placeholder="Type to search..." required>
                            <datalist id="datalistOptions">
                                @foreach($users as $user)
                                <option value="{{ $user->id_user }}">{{ $user->nama_user }}</option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Checkboxes -->
                <div class="mt-2">
                    <div class="mb-3 row">
                        <label for="dashboardlist" class="col-sm-3 col-form-label text-start">Dashboard</label>
                        <div class="col-sm-9 text-start">
                            @foreach($dashboards as $dashboard)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="dashboard[]" value="{{ $dashboard->id_dashboard }}" id="dashboard{{ $dashboard->id_dashboard }}">
                                <label class="form-check-label" for="dashboard{{ $dashboard->id_dashboard }}">
                                    {{ $dashboard->title }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Submit & Reset Buttons -->
                <div class="mt-2">
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" class="w-100 btn btn-sm btn-primary">Save</button>
                        </div>
                        <div class="col-6">
                            <button type="reset" class="w-100 btn btn-sm btn-secondary">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Data Otorisasi User Title -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="pagetitle text-center">
                <h1>Data Otorisasi User</h1>
            </div>
        </div>

        <!-- Data Table -->
        <div class="col-12">
            <table id="standar_table" class="table table-sm table-bordered table-striped" style="width:100%; font-size:12px;">
                <thead>
                <tr style="background-color: #F1F1F1">
                    <th>ID User</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>ID Dashboard</th>
                    <th>Dashboard</th>
                </tr>
                </thead>
                <tbody>
                @foreach($otorisasi as $data)
                <tr>
                    <td>{{ optional($data->user)->id_user ?? 'N/A' }}</td>
                    <td>{{ optional($data->user)->nama_user ?? 'N/A' }}</td>
                    <td>{{ optional($data->user)->description ?? 'N/A' }}</td>
                    <td>{{ optional($data->dashboard)->id_dashboard ?? 'N/A' }}</td>
                    <td>{{ optional($data->dashboard)->title ?? 'N/A' }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
