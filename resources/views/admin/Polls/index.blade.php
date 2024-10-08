@extends('admin.layouts.master1')
@section('title')
    {{__('polls')}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <livewire:poll-table/>
        </div>
    </div>
@endsection
{{--@section('page_js')--}}
{{--    <script src="{{mix('assets/js/poll/poll.js')}}"></script>--}}
{{--@endsection--}}

