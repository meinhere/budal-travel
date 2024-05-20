@props(['active' => false, 'icon'])

@svg($icon, ['class' => "w-5 h-5 transition duration-75 group-hover:text-gray-900 " . ($active ? 'text-gray-900' : 'text-gray-500')])