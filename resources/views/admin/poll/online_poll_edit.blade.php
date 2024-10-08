@extends('admin.layouts.master')

{{-- @section('heading', 'Edit Online Poll')

@section('button')
<a href="{{ route('admin.admin_online_poll_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
@endsection --}}

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ __('Edit Online Poll') }}</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <a href="{{ route('admin.admin_online_poll_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>


        </div>
<div class="section-body">
    <form action="{{ route('admin.admin_online_poll_update',$online_poll_data->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Question *</label>
                            <textarea name="question" class="form-control" cols="30" rows="10" style="height:150px;">{{ $online_poll_data->question }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Select Language</label>
                            <select name="language" class="form-control">
                                @foreach($language as $row)
                                <option value="{{ $row->lang }}" @if($row->id == $online_poll_data->language) selected @endif>{{ $row->name }}</option>
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
</div></div></section>
@endsection