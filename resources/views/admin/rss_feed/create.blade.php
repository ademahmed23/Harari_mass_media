@extends('admin.layouts.master1')
@section('title')
    {{__('Add Rss Feed')}}
@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ __('Feeds') }}</h1>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            

        </div>
    <div class="container-fluid">
        
        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
            <a class="btn btn-outline-primary float-end"
               href="{{ route('rss-feed.index') }}">{{ __('back') }}</a>
        </div>
        {{-- @include('layouts.errors') --}}
        {{-- @include('flash::message') --}}
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => ['rss-feed.store']]) }}
                @include('admin.rss_feed.fields')
                {{ Form::close() }}
            </div>
        </div>
    </div></section></div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#language-select').on('change', function() {
                let lang = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.fetch-news-category') }}",
                    data: {
                        lang: lang
                    },
                    success: function(data) {
                        $('#category').html("");
                        $('#category').html(
                            `<option value="">---{{ __('admin.Select') }}---</option>`);

                        $.each(data, function(index, data) {
                            $('#category').append(
                                `<option value="${data.id}">${data.name}</option>`)
                        })

                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush