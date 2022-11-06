@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue"></i>
                <div class="d-inline">
                    <h5>All Users</h5>
                    <span>List of our users</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Doctor</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Users</li>
                </ol>
            </nav>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        @if(Session::has('message'))
            <div class="alert bg-success alert-succes text-white" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <a href="{{ route('doctor.create') }}" class="btn btn-primary">Add New User</a>
        <div class="card">
            <!-- <div class="card-header"><h3>Data Table</h3></div> -->
            <div class="card-body">
                <table id="data_table" class="table">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th class="nosort">Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <!-- <th class="nosort">&nbsp;</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($users) > 0)
                            @foreach($users as $user)
                                    <tr>
                                        <td><img src="{{ asset('profile') }}/{{ $user->image }}" class="table-user-thumb" alt="profile-photo"></td>
                                        <td>{{ $user->name }}</td>
                                        <td
                                            @if($user->role->name == 'admin')
                                                class="badge badge-pill badge-dark mt-2"
                                            @endif
                                        >
                                            {{ ucfirst($user->role->name) }}
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="javascript:void()" data-toggle="modal" data-target="#exampleModal{{ $user->id }}"><i class="ik ik-eye"></i></a>
                                                <a href="{{ route('doctor.edit', $user->id) }}"><i class="ik ik-edit-2"></i></a>
                                                <a href="{{ route('doctor.show', [$user->id]) }}"><i class="ik ik-trash-2"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('admin.doctor.modal')
                                @endforeach
                            @else
                                <tr>
                                    <td>No users found.</td>
                                </tr>
                            @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection