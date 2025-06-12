@props(['active', 'href', 'text', 'icon' => null])

@php
  $baseClasses =
      'inline-flex items-center px-4 py-2 text-sm font-medium text-white rounded-md transition-colors duration-200';
  $activeClasses = $active ?? false ? 'bg-white/20' : 'hover:bg-white/10';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $baseClasses . ' ' . $activeClasses]) }}>
  @if ($icon)
    <i data-lucide="{{ $icon }}" class="w-4 h-4 mr-2"></i>
  @endif
  {{ $text }}
</a>
