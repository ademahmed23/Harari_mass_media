@extends('frontend.layouts.master')

@section('content')
<section class="page">
<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumbs bg-light mb-4">
                    <li class="breadcrumbs__item">
                        <a href="{{ url('/') }}" class="breadcrumbs__url">
                            <i class="fa fa-home"></i> {{ __('frontend.Home') }}</a>
                    </li>
                    <li class="breadcrumbs__item">
                        <a href="javascript:;" class="breadcrumbs__url">{{ __('previous') }}</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                @foreach($online_poll_data as $item)
                    @if($loop->iteration == 1)
                        @continue 
                    @endif
                    @php
                    $total_vote = $item->yes_vote+$item->no_vote;
                    if($item->yes_vote == 0)
                    {
                        $total_yes_percentage = 0;
                    }
                    else 
                    {
                        $total_yes_percentage = ($item->yes_vote*100)/$total_vote;
                        $total_yes_percentage = ceil($total_yes_percentage);
                    }
                            
                    if($item->no_vote == 0)
                    {
                        $total_no_percentage = 0;
                    }
                    else
                    {
                        $total_no_percentage = ($item->no_vote*100)/$total_vote;
                        $total_no_percentage = ceil($total_no_percentage);
                    }
                    @endphp
                <div class="item">
                    <div class="question">
                        {{ $item->question }}
                    </div>
                    <div class="date">
                        @php
                        $ts = strtotime($item->created_at);
                        $updated_date = date('d F, Y',$ts);
                        @endphp
                        <b>{{ __('POLL_DATE') }}</b> {{ $updated_date }}
                    </div>
                    <div class="total-vote">
                        <b>{{ __('TOTAL_VOTES') }}</b> {{ $total_vote }}
                    </div>
                    <div class="result">                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>{{ __('YES') }} ({{ $item->yes_vote }})</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $total_yes_percentage }}%" aria-valuenow="{{ $total_yes_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $total_yes_percentage }}%</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ __('NO') }} ({{ $item->no_vote }})</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $total_no_percentage }}%" aria-valuenow="{{ $total_no_percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $total_no_percentage }}%</div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</div></section>
@endsection