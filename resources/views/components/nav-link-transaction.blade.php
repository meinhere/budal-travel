@props(['active' => false])

<a {{ $attributes }} class="px-2 pb-1 font-semibold border-b-2 hover:text-primary-300 hover:border-primary-300 {{ $active ? 'text-primary-300 border-primary-300' : 'text-gray-800 border-transparent' }}">{{ $slot }}</a>