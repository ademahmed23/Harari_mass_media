@extends('layouts.app')
@section('title')
    {{__('messages.poll.edit_poll')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
            <a class="btn btn-outline-primary float-end"
               href="{{ route('polls.index') }}">{{ __('messages.common.back') }}</a>
        </div>
        <div class="col-12">
            @include('layouts.errors')
        </div>
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => ['polls.update', $poll->id], 'method' => 'put']) }}
                    @include('Polls.fields')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
