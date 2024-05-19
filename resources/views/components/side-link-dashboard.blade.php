@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg hover:bg-primary-200 bg-primary-200 group'
            : 'flex items-center p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg hover:bg-primary-200 group';
@endphp


<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>