@if ($this->showBulkActionsDropdown)
    <div class="d-flex" style="white-space: nowrap"
         id="{{ $bulkKey = \Illuminate\Support\Str::random() }}-bulkActionsWrapper">
        @foreach($this->bulkActions as $action => $title)
            <div class="me-2">
                <a href="#" wire:click.prevent="{{$action}}" wire:key="bulk-action-{{$action}}"
                   class="btn btn-primary w-100">
                    {{$title}}
                </a>
            </div>
        @endforeach
    </div>
@endif
