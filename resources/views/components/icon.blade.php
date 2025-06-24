@props(['size' => 5, 'name', 'color' => 'text-gray-400'])

<i data-lucide="{{ $name }}" class="w-{{ $size }} h-{{ $size }} {{ $color }}"></i>
