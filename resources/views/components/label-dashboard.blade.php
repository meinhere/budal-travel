@props(['for'])

<label for="{{ $for }}" {{ $attributes->merge(['class' => 'text-xl font-semibold text-secondary-base']) }}>
    {{ $slot }}
</label>