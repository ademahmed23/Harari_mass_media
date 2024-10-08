@extends('layouts.app')
@section('title')
    {{__('messages.poll.poll_result')}}
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
                <div>
                    @php $styleCss = 'style'; @endphp
                    @php $vote = getPollStatistics($id) @endphp
                    @if(!empty($vote['totalPollResults']))
                        <p class="text-center fw-bold mb-5 fs-5">
                            {{__('messages.poll.total_vote')}}: {{ $vote['totalPollResults'] }} </p>
                    @else
                        <p class="text-center fw-bold mb-5 fs-5">
                            {{__('messages.poll.no_result_found')}} </p>
                    @endif
                    <div class="mb-2">
                        <div class="mb-2">
                            @foreach($vote['optionAns'] as $pollName => $statistic)
                                <div class="mb-5 progress-last-mb">
                                    <p class="mt-0 mb-1 fs-5">{!! $pollName !!}</p>
                                    <div class="progress vote-progressbar mb-2 position-relative">
                                        <div class="progress-bar progress-bar-striped"
                                             role="progressbar" {{ $styleCss }}="
                                                            width: {{$statistic}}%;"
                                        aria-valuenow="{{$statistic}}"
                                        aria-valuemin="0" aria-valuemax="100">
                                        <span class="fw-bolder me-3 position-absolute end-0 
{{ (!Auth::user()->dark_mode) ? 'text-black' : 'text-white' }} fs-7">{{$statistic}}%</span>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

