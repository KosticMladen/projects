@extends('admin.layout.app')

@section('heading', 'Edit Terms and Conditions Page')

@section('main_content')

<div class="section-body">
    <form action="{{ route('admin_page_terms_update') }}" method="post">

        @csrf

        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" name="terms_title" value="{{ $page_data->terms_title }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Detail *</label>
                            <textarea name="terms_detail" class="form-control snote" cols="30" rows="10">
                                {{ $page_data->terms_detail }}
                            </textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label>Status</label>
                            <select name="terms_status" class="form-control">
                                <option value="Show" @if($page_data->terms_status == 'Show') selected @endif >Show</option>
                                <option value="Hide" @if($page_data->terms_status == 'Hide') selected @endif >Hide</option>
                            </select>
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