@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Confirm Delete</h5>
                    <span>Are you sure you want to delete this profile?</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('doctor.index') }}"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Delete</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Delete User</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" method="post" action="{{ route('doctor.destroy', [$user->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <img src="{{ asset('images') }}/{{ $user->image }}" width="100" alt="profile-photo">
                    <p style="margin: 1rem 0 1rem 0; font-weight: bold;">Are you sure you want to delete {{ $user->name }}?</p>
                    <div class="row">
                    </div>
                    <button type="submit" class="btn btn-danger mr-2">Yes, delete.</button>
                    <a  class="btn btn-light" href="{{ route('doctor.index') }}">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection