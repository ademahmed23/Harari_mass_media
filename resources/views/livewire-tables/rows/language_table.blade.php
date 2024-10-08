<x-livewire-tables::bs5.table.cell>
    {{ $row->name }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ $row->iso_code }}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm d-flex justify-content-start cursor-pointer">
        <input type="checkbox" name="status" class="form-check-input  cursor-pointer" value="{{$row->front_language_status}}" 
        wire:click="updateLanguageStatus({{$row['id']}})" {{ (($row->front_language_status)=="1") ? 'checked' : ''}}>
        <span class="custom-switch-indicator"></span>
    </label>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <a class="text-decoration-none" id="languageTranslation" href="{{ route('languages.translation',$row->id) }}">   {{ __('messages.language.edit_translation') }} </a>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'custom-width-action']">
    <div class="d-flex justify-content-start">
        <a href="javascript:void(0)" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.common.edit') }}"
           class="btn px-1 text-primary fs-3 edit-language-btn"  data-id="{{$row['id']}}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="javascript:void(0)" data-id="{{ $row['id'] }}" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.delete') }}"  
           class="btn px-1 text-danger fs-3 language-delete-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>
