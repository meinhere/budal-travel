@props(['id'])

@php
    $classes = count($errors->get($id)) > 0 ? 'border-rose-500 focus:border-rose-500' : 'border-primary-base focus:border-primary-200';
@endphp

<input
    {{ $attributes->merge(['class' => "block px-2.5 pb-2.5 pt-4 w-full text-sm font-extralight text-primary-base tracking-wide bg-transparent rounded-lg border-1 appearance-none focus:outline-none focus:ring-0 focus:border-2 peer " . $classes, 'placeholder' => " ", 'id' => $id]) }}
/>