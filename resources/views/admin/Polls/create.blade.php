@extends('admin.layouts.master1')
{{-- @section('title')
    {{__('Add Poll')}}
@endsection --}}
@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ __('Polls') }}</h1>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h4>{{ __('Add Poll') }}</h4>

        </div>

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
            <a class="btn btn-primary float-end"
               href="{{ route('polls.index') }}">{{ __('back') }}</a>
        </div>
        <div class="col-12">
            {{-- @include('layouts.errors') --}}
        </div>
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => 'polls.store',]) }}
                @include('admin.Polls.fields')
                {{ Form::close() }}
            </div>
        </div>
    </div>
    </div>
</section>
@endsection


