@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">User Profile</div>

                <div class="card-body">
                    <p><b>Name:</b> {{ auth()->user()->name }}</p>
                    <p><b>Email:</b> {{ auth()->user()->email }}</p>
                    @if(auth()->user()->address)
                        <p><b>Address:</b> {{ auth()->user()->address }}</p>
                    @endif
                    @if(auth()->user()->phone_number)
                        <p><b>Phone Number:</b> {{ auth()->user()->phone_number }}</p>
                    @endif
                    <p><b>Gender:</b> {{ auth()->user()->gender }}</p>
                    @if(auth()->user()->description)
                        <p><b>Bio:</b> {{ auth()->user()->description }}</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Update Profile</div>
                <div class="card-body">
                    <form action="{{ route('profile.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="fw-bold" for="">Name</label>
                            <input
                                name="name"
                                type="text"
                                class="form-control
                                    @error('gender')
                                        is-invalid
                                    @enderror
                                "
                                value="{{ auth()->user()->name }}"
                            >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="fw-bold" for="">Address</label>
                            <input name="address" type="text" class="form-control" value="{{ auth()->user()->address }}">
                        </div>
                        <div class="form-group">
                            <label class="fw-bold" for="">Phone Number</label>
                            <input name="phone_number" type="text" class="form-control" value="{{ auth()->user()->phone_number }}">
                        </div>
                        <div class="form-group">
                            <label class="fw-bold" for="">Gender</label>
                            <select
                                name="gender"
                                class="form-control
                                    @error('gender')
                                        is-invalid
                                    @enderror
                                "
                            >
                                <option
                                    value="male"
                                    @if(ucfirst(strtolower(auth()->user()->gender)) == 'Male')
                                        selected
                                    @endif
                                >
                                    Male
                                </option>
                                <option
                                    value="female"
                                    @if(ucfirst(strtolower(auth()->user()->gender)) == 'Female')
                                        selected
                                    @endif
                                >
                                    Female
                                </option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="fw-bold" for="">Bio</label>
                            <textarea name="description" class="form-control" cols="30" rows="5">
                                {{ auth()->user()->description }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <div class="mt-2">
                                <button class="btn btn-primary" type="submit">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Update Image</div>

                <div class="card-body" style="text-align: center">
                    @if(!auth()->user()->image)
                        <img width="100" src="{{ asset('images/admin.jpg') }}" alt="existing-user-photo">
                    @else
                        <img width="100" src="{{ asset('profile') }}/{{ auth()->user()->image }}" alt="existing-user-photo">
                    @endif
                    <div class="mt-2">
                        <form action="{{ route('profile.pic') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input
                                type="file"
                                name="file"
                                class="form-control
                                    @error('file')
                                        is-invalid
                                    @enderror
                                "
                                required
                            >
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
