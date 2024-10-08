<x-livewire-tables::bs5.table.cell>
    {!! !empty($row->posts->title) ? $row->posts->title : __('messages.menu.n_a') !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->email }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {!! $row->comment !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="form-check form-switch form-check-custom form-check-solid mt-2 cursor-pointer">
        <input class="form-check-input w-35px h-20px is-active  cursor-pointer" data-bs-toggle="tooltip"
               data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{__('messages.common.edit') }}"
               wire:change="updateStatus({{$row->status}},{{$row->id}})" name="status" type="checkbox"
               value="{{$row->status}}"
            {{ (($row->status)=="1") ? 'checked' : ''}} >
        <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="d-flex justify-content-start">
        <a href="javascript:void(0)" data-id="{{$row['id']}}" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.delete') }}"
           class="btn px-2 text-danger fs-2 comment-delete-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>
