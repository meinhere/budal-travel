@props(['id', 'type'])

@php
    $classes = count($errors->get($id)) > 0 ? 'border-rose-500 focus:border-rose-500 text-rose-500 font-semibold' : 'border-primary-base focus:border-primary-200 text-primary-base';
@endphp

<input
    {{ $attributes->merge(['class' => "block px-2.5 pb-2.5 pt-4 w-full text-sm font-extralight tracking-wide bg-transparent rounded-lg border-1 appearance-none focus:outline-none focus:ring-0 focus:border-2 peer " . $classes, 'placeholder' => " ", 'id' => $id, 'type' => $type]) }}
/>