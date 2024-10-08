<x-livewire-tables::bs5.table.cell>
    {{ !empty($row->user) ? $row->user->full_name : '' }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->plan->name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ \Carbon\Carbon::parse($row->starts_at)->isoFormat('Do MMM YYYY')}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ \Carbon\Carbon::parse($row->ends_at)->isoFormat('Do MMM YYYY')}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="planStatus" name="is_active"
               {{ $row->status == 1 ? 'disabled checked' : ''}} data-id="{{$row->id}}">
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="justify-content-center d-flex">
        <a title="{{ __('messages.common.edit') }}" class="btn px-1 text-primary fs-3 subscribed-user-plan-edit-btn"
           data-id="{{$row->id}}" data-turbolinks="false">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>
