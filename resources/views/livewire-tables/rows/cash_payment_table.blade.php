<style>
    .plan-amount div {
        justify-content: end;
    }

    .date-align div {
        justify-content: center;
    }
</style>
<x-livewire-tables::bs5.table.cell>
    {{ !empty($row->user) ? $row->user->full_name : '' }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ ($row->plan->name) }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="text-end">
    {{currencyFormat($row->plan_amount,$row->plan->currency->currency_icon) ?? 0}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="text-end">
    {{currencyFormat($row->payable_amount,$row->plan->currency->currency_icon) ?? 0}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="text-center">
    {{ \Carbon\Carbon::parse($row->starts_at)->isoFormat('Do MMMM YYYY')}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell class="text-center">
    {{ \Carbon\Carbon::parse($row->ends_at)->isoFormat('Do MMM YYYY')}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>

    @if($row->attachment)
        <a href="{{ url('admin/download-attachment'.'/' .$row->id) }}" target="_blank" class="text-decoration-none">Download</a>
    @else
        N/A
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{$row->notes ?? "N/A"}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell class="text-center">
    
    @if ($row->payment_type == App\Models\Subscription::MANUALLY)
    <div class="dropdown">
        <a class="btn btn-warning dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
           data-bs-toggle="dropdown" aria-expanded="false">
            {{ __('messages.common.pending') }}
        </a>
        <ul class="dropdown-menu withdraw-approval-dropdown" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#" data-id="{{ $row->id }}" id="approvedPayment">{{ __('messages.common.approved') }}</a>
            </li>
            <li><a class="dropdown-item" href="#" data-id="{{ $row->id }}"
                   id="rejectedPayment">{{ __('messages.common.rejected') }}</a>
            </li>
        </ul>
    </div>
    @elseif($row->payment_type == App\Models\Subscription::REJECTED)
        <a class="text-danger bg-light-danger badge text-decoration-none"> Rejected</a>

    @else
        <span class="badge bg-light-success">Received</span>
    @endif

</x-livewire-tables::bs5.table.cell>
