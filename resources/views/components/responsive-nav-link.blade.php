@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-secondary-base text-start text-base font-medium text-secondary-base bg-secondary-100 focus:outline-none focus:text-secondary-base focus:bg-secondary-100 focus:border-secondary-base transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-secondary-100 hover:border-secondary-base focus:outline-none focus:text-gray-800 focus:bg-secondary-100 focus:border-secondary-base transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
