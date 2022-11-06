@extends('admin.layout.app')

@section('heading', 'Edit Author')

@section('button')

<a href="{{ route('admin_author_show'); }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>

@endsection

@section('main_content')

<div class="section-body">
    <form action="{{ route('admin_author_update', $author_data->id) }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="row">

            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label>Existing Photo </label>
                            <div>
                                <img src="{{ asset('uploads/' . $author_data->photo) }}" alt="existing-author-photo" style="width: 200px">
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Photo </label>
                            <div>
                                <input type="file" class="form-control" name="photo">
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label>Name *</label>
                            <input type="text" class="form-control" name="name" value="{{ $author_data->name }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Email Address *</label>
                            <input type="email" class="form-control" name="email" value="{{ $author_data->email }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group mb-3">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="retype_password">
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>

@endsection