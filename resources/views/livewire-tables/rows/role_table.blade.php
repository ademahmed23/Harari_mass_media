<x-livewire-tables::bs5.table.cell>
    {!! $row->display_name !!}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {!! $row->users->count() !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @foreach($row->permissions as $permissions)
        <span class="badge bg-{{ getRandomColor($loop->index) }}  fs-7 m-1">{!! $permissions->display_name !!}</span>
    @endforeach
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if($row->name !='customer')
        <div class="d-flex justify-content-start">

            <a href="{{ route('roles.edit', $row->id) }}" data-bs-toggle="tooltip"
               data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.common.edit') }}"
               class="btn px-1 text-primary fs-3 role-edit-btn"  data-id="{{$row->id}}">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <a href="javascript:void(0)" data-id="{{ $row->id }}" data-bs-toggle="tooltip"
               data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.delete') }}"
               class="btn px-1 text-danger fs-3 delete-btn" >
                <i class="fa-solid fa-trash"></i>
            </a>
        </div>
    @endif
</x-livewire-tables::bs5.table.cell>
