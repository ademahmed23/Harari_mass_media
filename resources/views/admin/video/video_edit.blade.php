@extends('admin.layouts.master')

{{-- @section('heading', 'Edit Video')

@section('button') --}}
{{-- @endsection --}}

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
    <form action="{{ route('admin.admin_video_update',$video_data->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Video Id *</label>
                            <input type="text" class="form-control" name="video_id" value="{{ $video_data->video_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Caption *</label>
                            <input type="text" class="form-control" name="caption" value="{{ $video_data->caption }}">
                        </div>
                        <div class="form-group">
                            <label for="">{{ __('admin.Language') }}</label>
                            <select name="language" id="language-select" class="form-control select2">
                                <option value="">--{{ __('admin.Select') }}--</option>
                                @foreach ($languages as $lang)
                                    <option {{ $lang->lang === $video_data->language ? 'selected' : '' }} value="{{ $lang->lang }}">
                                        {{ $lang->name }}</option>
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
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div></div></section>
@endsection