@extends('admin.layouts.master1')
{{-- @section('title')
    {{__('messages.rss-feed')}}
@endsection --}}

@section('content')
    <div class="container-fluid overflow-auto">
        {{-- @include('flash::message') --}}
        <div class="d-flex flex-column">
            <livewire:rss-feed-table/>
        </div>
    </div>
@endsection
