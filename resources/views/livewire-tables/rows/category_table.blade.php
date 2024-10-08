<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'text-size']">
    {!! $row->name !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'text-size']">
    {!! $row->language->name !!}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'text-size']">
    {!! count($row->posts) !!}
</x-livewire-tables::bs5.table.cell>


<x-livewire-tables::bs5.table.cell>
    <div class="form-check form-switch form-check-custom form-check-solid mt-2 justify-content-start">
        <input class="form-check-input w-35px is-active cursor-pointer"
               wire:change="updateShowInMenu({{$row->show_in_menu}},{{$row->id}})" name="show_in_menu" type="checkbox"
               value="{{$row->show_in_menu}}"
            {{ (($row->show_in_menu)=="1") ? 'checked' : ''}} >
        <span class="custom-switch-indicator"></span>
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="form-check form-switch mt-2 justify-content-start">
        <input class="form-check-input w-35px cursor-pointer is-active"
               wire:change="updateShowInHome({{$row->show_in_home_page}},{{$row->id}})" name="show_in_home_page"
               type="checkbox" value="{{$row->show_in_home_page}}"
            {{ (($row->show_in_home_page)=="1") ? 'checked' : ''}} >
        <span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'text-size']">
    <div class="d-flex align-items-start">
        <a href="javascript:void(0)" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{__('messages.common.edit') }}" data-id="{{ $row->id }}"
           class="edit-category-btn btn px-1 text-primary fs-3 ps-0">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="javascript:void(0)" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{__('messages.delete')}}" data-id="{{ $row->id }}"
           class="delete-category-btn btn px-1 text-danger fs-3 pe-0" wire:key="{{$row->id}}">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>
