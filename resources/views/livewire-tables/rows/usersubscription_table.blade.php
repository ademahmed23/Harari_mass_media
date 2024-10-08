<style>
    .plan-amount div {
        justify-content: end;
    !important;
    }

    .date-align div {
        justify-content: center;
    !important;
    }
</style>
<x-livewire-tables::bs5.table.cell>
    <span class="">{{$row->plan->name}}</span>
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell class="text-end">
    {{--    <span class="">{{$row->plan->currency->currency_icon . '  ' .number_format($row->plan_amount)}}</span>--}}
    <span class="">{{ currencyFormat($row->plan_amount, $row->plan->currency->currency_code) }}</span>
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell class="text-center">
    <span class="">{{Carbon\Carbon::parse($row->starts_at)->isoFormat('Do MMM, YYYY')}}</span>
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    <span class="">{{Carbon\Carbon::parse($row->ends_at)->isoFormat('Do MMM, YYYY')}}</span>
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    @if($row->payment_type == App\Models\Subscription::MANUALLY)
        <span class="badge bg-warning">{{__('messages.comment.pending')}}</span>
    @endif
    @if($row->payment_type == App\Models\Subscription::REJECTED)
            <span class="badge bg-danger">{{__('messages.common.rejected')}}</span>
    @endif
    @if (!$row->payment_type == App\Models\Subscription::MANUALLY || !$row->payment_type == App\Models\Subscription::REJECTED ||$row->payment_type == App\Models\Subscription::PAID)
       
        @if($row->status == 1)
            <span class="badge bg-success">{{__('messages.common.active')}}</span>
        @else
            <span class="badge bg-danger">{{ __('messages.common.closed') }}</span>
        @endif
    @endif
</x-livewire-tables::bs5.table.cell>
