<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'd-flex']">

    @php
        $image = $row->post_types == \App\Models\Post::VIDEO_TYPE_ACTIVE ? (!empty($row->postVideo->thumbnail_image_url) ? $row->postVideo->thumbnail_image_url : $row->postVideo->uploaded_thumb ?? '') : $row->post_image;
    @endphp
    <div class="d-flex align-items-center">
        <div class=" position-relative overflow-hidden width-custom">
            <a href="{{ $image }}" data-lightbox="image-{{$row->id}}">
                <img src="{{ $image }}" class="float-start  width-custom">
                @if($row->status == 0)
                    <span class="badge badge-tag bg-warning position-absolute">{{__('messages.post.draft_post')}}</span>
                @endif
            </a>
        </div>
        <div class="d-flex flex-column align-items-start">
            <a href="{{ route('detailPage',$row->slug) }}"
               class="mb-0 ps-2 lh-15 text-decoration-none {{ $row->status != 0 ? '' : 'pe-none' }} {{ $row->visibility != 0 ? '' : 'pe-none' }}"
               target="_blank"> {!!  $row->title !!} </a>
            <div>
            <span class="badge bg-light-primary   fs-7 m-1 ">
                {!!$row->type_name  !!}
             </span>
            <span class="badge bg-light-{{getRandomColor($loop->index)}}  fs-7 m-1 ">
                {!! $row->category->name !!}
             </span>
                <span class="badge bg-light-primary  fs-7 m-1 ">
                    <i class="fa-solid fa-language"></i>
                {!! $row->language->name !!}
             </span>
                <span class="badge bg-light-{{getRandomColor($loop->index)}}  fs-7 m-1 ">
                     <i class="fa-solid fa-eye fs-12 text-gray me-1"></i>
                    {{getPostViewCount($row->id)}}
             </span>
            </div>
        </div>
    </div>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell :customAttributes="['style' => 'width:100px']">
    <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm d-flex justify-content-start cursor-pointer">
        <input type="checkbox" name="status" class="form-check-input  cursor-pointer" value="{{$row->show_on_headline}}" wire:click="updateHeadline({{$row['id']}})"
                {{ (($row->show_on_headline)=="1") ? 'checked' : ''}}>
        <span class="custom-switch-indicator"></span>
    </label>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm d-flex justify-content-start cursor-pointer">
            <input type="checkbox" name="status" class="form-check-input post-visibility cursor-pointer" value="{{$row->visibility}}" wire:click="updateVisibility({{$row['id']}})"
                {{ (($row->visibility)=="1") ? 'checked' : ''}}>
        <span class="custom-switch-indicator"></span>
    </label>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm d-flex justify-content-start cursor-pointer">
        <input type="checkbox" name="status" class="form-check-input  cursor-pointer" value="{{$row->featured}}" wire:click="updateFeatured({{$row['id']}})"
                {{ (($row->featured)=="1") ? 'checked' : ''}}>
        <span class="custom-switch-indicator"></span>
    </label>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {{ \Carbon\Carbon::parse($row->created_at)->isoFormat('Do MMM, YYYY')}}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <div class="action-btn d-flex option align-items-center">
        <div class="dropdown">
            <button class="btn btn-light btn-sm dropdown-toggle hide-arrow" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                {{__('messages.common.select_an_option')}}
            </button>
            <ul class="dropdown-menu min-width-220" aria-labelledby="dropdownMenuButton1">
                <li>
                    @if(Auth::user()->hasRole('customer'))
                        <a href="{{route('customer-posts.edit', $row['id'])}}"
                           class="dropdown-item posts-edit-btn px-3 py-1 text-decoration-none">
                            {{__('messages.common.edit')}}
                        </a>
                    @endif
                    @if(!Auth::user()->hasRole('customer'))
                        <a href="{{route('posts.edit', $row['id'])}}"
                           class="dropdown-item posts-edit-btn px-3 py-1 text-decoration-none">
                            {{__('messages.common.edit')}}
                        </a>
                    @endif
                </li>
                <li>
                    @if(!Auth::user()->hasRole('customer'))
                        <a href="{{route('posts.show',$row['id'])}}"
                           class="dropdown-item px-3 py-1 text-decoration-none">
                            {{__('messages.common.view')}}
                        </a>
                    @endif
                    @if(Auth::user()->hasRole('customer'))
                        <a href="{{route('customer-posts.show',$row['id'])}}"
                           class="dropdown-item px-3 py-1 text-decoration-none">
                            {{__('messages.common.view')}}
                        </a>
                    @endif
                </li>

                @if(!$row->status)
                <li>
                    <a href="#" class="dropdown-item px-3 py-1 text-decoration-none"
                       wire:click="publishPost({{$row['id']}})">
                            {{__('messages.post.publish_post')}}
                    </a>
                </li>
                @endif
                <li>
                    <a href="#" class="dropdown-item px-3 py-1 text-decoration-none"
                       wire:click="updateBreaking({{$row['id']}})">
                        @if($row->breaking)
                            {{__('messages.post.remove_to_breaking')}}
                        @else
                            {{__('messages.post.add_to_breaking')}}
                        @endif
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item px-3 py-1 text-decoration-none"
                       wire:click="updateSlider({{$row['id']}})">
                        @if($row->slider)
                            {{__('messages.post.remove_to_slider')}}
                        @else
                            {{__('messages.post.add_to_slider')}}
                        @endif
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-item px-3 py-1 text-decoration-none"
                       wire:click="updateRecommended({{$row['id']}})">
                        @if($row->recommended)
                            {{__('messages.post.remove_to_recommended')}}
                        @else
                            {{__('messages.post.add_to_recommended')}}
                        @endif
                    </a>
                </li>
            </ul>
        </div>
        <a href="javascript:void(0)" data-id="{{$row['id']}}" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.delete') }}"
           class="btn px-2 text-danger fs-3 delete-posts-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>

</x-livewire-tables::bs5.table.cell>
