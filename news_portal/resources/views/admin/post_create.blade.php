@extends('admin.layout.app')

@section('heading', 'Create Post')

@section('button')

<a href="{{ route('admin_post_show'); }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>

@endsection

@section('main_content')

<div class="section-body">
    <form action="{{ route('admin_post_store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group mb-3">
                            <label>Post Title *</label>
                            <input type="text" class="form-control" name="post_title" value="">
                        </div>

                        <div class="form-group mb-3">
                            <label>Post Detail *</label>
                            <textarea name="post_detail" class="form-control snote" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>Post Photo *</label>
                            <input type="file" class="form-control" name="post_photo" value="">
                        </div>

                        <div class="form-group mb-3">
                            <label>Select Category *</label>
                            <select name="sub_category_id" class="form-control">

                                @foreach($sub_categories as $item)

                                <option value="{{ $item->id }}">{{ $item->sub_category_name }} ({{ $item->rCategory->category_name }})</option>

                                @endforeach

                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Is Shareable</label>
                            <select name="is_share" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Comments</label>
                            <select name="is_comment" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label>Tags *</label>
                            <small>(Ex: tag1, tag2)</small>
                            <input type="text" class="form-control" name="tags" value="">
                        </div>

                        <div class="form-group mb-3">
                            <label>Send to subscribers</label>
                            <select name="subscriber_send_option" class="form-control">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection