@extends('admin.layouts.master')

{{-- @section('content', 'Edit Live Channel') --}}

{{-- @section('content') --}}
{{-- @endsection --}}
{{-- @if(!session()->get('session_short_name')) --}}
    {{-- @php
    $current_short_name = $lang;
    @endphp
@else
    @php
    $current_short_name = session()->get('session_short_name');
    @endphp
@endif
@php
    $current_language_id = \App\Models\Language::where('short_name',$current_short_name)->first()->id;
@endphp --}}
@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ __('admin.News') }}</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('admin.Update News') }}</h4>

        </div>
<div class="section-body">
    <form action="{{ route('admin.admin_live_channel_update',$live_channel_data->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Video Id *</label>
                            <input type="text" class="form-control" name="video_id" value="{{ $live_channel_data->video_id }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Heading *</label>
                            <input type="text" class="form-control" name="heading" value="{{ $live_channel_data->heading }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Language</label>
                            <select name="language" class="form-control">
                                @foreach($languages as $lang)
                                <option value="{{ $lang->id }}" @if($lang->id == $live_channel_data->language) selected @endif>{{ $lang->name }}</option>
                                @endforeach
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
    </div>
</section>
@endsection