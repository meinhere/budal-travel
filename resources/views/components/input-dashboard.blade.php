@props(['id', 'value' => ''])

@php
    $classes = count($errors->get($id)) > 0 ? 'border-rose-500 focus:border-rose-500 focus:ring-rose-500' : 'border-gray-300 focus:border-primary-300 focus:ring-primary-300';
@endphp

<input {{ $attributes->merge(['class' => 'bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5 ' . $classes, 'value' => $value ]) }}>