@props(['for'])

@php
    $classes = count($errors->get($for)) > 0 ? 'text-rose-500 peer-focus:text-rose-500' : 'text-primary-base peer-focus:text-primary-200';
@endphp

<label {{ $attributes->merge(['class' => "absolute text-sm duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] font-extralight tracking-wide bg-secondary-base px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1 " . $classes, 'for' => $for]) }}>
    {{ $slot }}
</label>