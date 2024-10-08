@extends('admin.layouts.master')

{{-- @section('heading', 'Add Video')

@section('button')
<a href="{{ route('admin.admin_video_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection --}}

@section('content')
<section class="section">
    <div class="section-header">
        <h1><a href="{{ route('admin.admin_video_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
        </h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('admin.Update News') }}</h4>

        </div>
<div class="section-body">
    <form action="{{ route('admin.admin_video_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Video Id *</label>
                            <input type="text" class="form-control" name="video_id">
                        </div>
                        <div class="form-group mb-3">
                            <label>Caption *</label>
                            <input type="text" class="form-control" name="caption">
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('admin.Language') }}</label>
                            <select name="language" id="language-select" class="form-control select2">
                                <option value="">--{{ __('admin.Select') }}--</option>
                                @foreach ($languages as $lang)
                                    <option value="{{ $lang->lang }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                            @error('language')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
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
    </div></section>
@endsection