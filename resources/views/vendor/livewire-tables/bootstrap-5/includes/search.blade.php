@php  $styleCss = 'style' @endphp
@if ($showSearch)
    <div class="mb-3 mb-sm-0">
        <form class="d-flex position-relative">
            <div class="position-relative d-flex width-320">
                              <span
                                      class="position-absolute d-flex align-items-center top-0 bottom-0 left-0 text-gray-600 ms-3">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                <input wire:model{{ $this->searchFilterOptions }}="filters.search"
                       placeholder="{{__('messages.search')}}"
                       type="search"
                       class="form-control ps-8"
                       aria-label="Search">
            </div>
        </form>
    </div>
    
@endif
