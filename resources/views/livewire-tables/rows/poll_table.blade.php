<x-livewire-tables::bs5.table.cell>
    {!!  $row->question !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {!!  $row->language->name !!}
</x-livewire-tables::bs5.table.cell>



<x-livewire-tables::bs5.table.cell>
    <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm d-flex justify-content-start cursor-pointer">
        <input type="checkbox" name="status" class="form-check-input is-active cursor-pointer"
               wire:change="updateStatus({{$row->status}},{{$row->id}})" value="{{$row->status}}"
                {{ (($row->status)=="1") ? 'checked' : ''}}>
        <span class="custom-switch-indicator"></span>
    </label>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <a class="text-decoration-none" href="{{ route('polls-vote-result',$row->id) }}">   {{ __('messages.poll.show_result') }} </a>
</x-livewire-tables::bs5.table.cell>


<x-livewire-tables::bs5.table.cell>
    <div class="d-flex justify-content-start">
        <a href="{{route('polls.edit',$row['id'])}}" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.common.edit') }}"
           class="btn px-0 text-primary fs-3 polls-edit-btn" data-id="{{$row->id}}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="javascript:void(0)" data-id="{{$row['id']}}" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.delete') }}"
           class="btn px-2 text-danger fs-3 delete-poll-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>
