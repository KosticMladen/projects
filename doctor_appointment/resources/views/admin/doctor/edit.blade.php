@extends('admin.layouts.master')

@section('content')

<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Update User</h5>
                    <span>Update users's profile.</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Update User</li>
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
                <h3>Update User</h3>
            </div>
            <div class="card-body">
                <form class="forms-sample" method="post" action="{{ route('doctor.update', [$user->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Full Name</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Full Name"
                                value="{{ $user->name }}"
                            >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Email Address</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email Address"
                                value="{{ $user->email }}"
                            >
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Password"
                            >
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Gender</label>
                            <div>
                                <select
                                    name="gender"
                                    class="form-control @error('gender') is-invalid @enderror"
                                >
                                    @foreach(['Male', 'Female'] as $gender)
                                        <option
                                            value="{{ $gender }}"
                                            @if($gender == $user->gender)
                                                selected
                                            @endif
                                        >
                                            {{ ucfirst($gender) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Education</label>
                            <input
                                type="text"
                                name="education"
                                class="form-control @error('education') is-invalid @enderror"
                                placeholder="Education"
                                value="{{ $user->education }}"
                            >
                            @error('education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Address</label>
                            <input
                                type="text"
                                name="address"
                                class="form-control @error('address') is-invalid @enderror"
                                placeholder="Address"
                                value="{{ $user->address }}"
                            >
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="">Department</label>
                            <select name="department" class="form-control">
                                @foreach(App\Models\Department::all() as $department)
                                    <option
                                        value="{{ $department->department }}"
                                        @if($department->department == $user->department)
                                            selected
                                        @endif
                                    >
                                        {{ $department->department }}
                                    </option>
                                @endforeach
                            </select>
                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="">Phone Number</label>
                            <input
                                type="text"
                                name="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror"
                                placeholder="Phone Number"
                                value="{{ $user->phone_number }}"
                            >
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Image</label>
                                <input
                                    type="file"
                                    name="image"
                                    class="form-control file-upload-info @error('image') is-invalid @enderror"
                                    placeholder="Upload Image"
                                >
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Role</label>
                            <select
                                name="role_id"
                                class="form-control @error('role_id') is-invalid @enderror"
                            >
                                <option value="">Select Role</option>
                                @foreach(App\Models\Role::where('name', '!=', 'patient')->get() as $role)
                                    <option
                                        value="{{ $role->id }}"
                                        @if($role->id == $user->role_id)
                                            selected
                                        @endif
                                    >
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">About</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror">
                            {{ $user->description }}
                        </textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </div>
                    <button class="btn btn-primary mr-2">Update</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection