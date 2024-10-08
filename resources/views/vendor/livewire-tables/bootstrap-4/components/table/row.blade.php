@props(['url' => null, 'target' => '_self', 'reordering' => false, 'customAttributes' => []])

@if (!$reordering && (method_exists($attributes, 'has') ? $attributes->has('wire:sortable.item') : array_key_exists('wire:sortable.item', $attributes->getAttributes())))
    @php
        $attributes = $attributes->filter(fn ($value, $key) => $key !== 'wire:sortable.item');
    @endphp
@endif

@php $styleCss = 'style' @endphp
<tr
    {{ $attributes->merge($customAttributes) }}

    @if ($url)
        onclick="window.open('{{ $url }}', '{{ $target }}')"
       {{$styleCss}}="cursor:pointer"
    @endif
>
    {{ $slot }}
</tr>
