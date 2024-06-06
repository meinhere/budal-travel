@props(['value', 'profit', 'presentage', 'from'])

<div class="p-4 shadow basis-full lg:basis-1/3 rounded-xl">
    <div class="pb-8">
        <h3 class="text-base font-normal text-gray-500">{{ $slot }}</h3>
        <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl">Rp {{ number_format($value, 0, ',', '.') }}</span>
    </div>

    <p class="text-xs font-semibold text-gray-400"><span class="px-3 py-1 mr-1 {{ $profit ? 'text-green-500 bg-green-100' : 'text-red-500 bg-red-100' }} rounded-xl">{{ $profit ? '+' . $presentage . '%' : '-' . $presentage . '%' }}</span> From {{ $from . "%" }}</p>
</div>