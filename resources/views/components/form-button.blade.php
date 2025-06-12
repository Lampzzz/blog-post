@props(['text', 'type' => 'button', 'icon' => null, 'variant' => 'primary'])

@php
  $baseClasses =
      'inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest transition ease-in-out duration-150 focus:outline-none focus:ring';

  $variants = [
      'primary' => 'bg-blue-600 text-white hover:bg-blue-700 focus:border-blue-700 focus:ring-blue-300',
      'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:border-red-700 focus:ring-red-300',
  ];

  $variantClasses = $variants[$variant] ?? $variants['primary'];
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $baseClasses . ' ' . $variantClasses]) }}>
  @if ($icon)
    <i class="fas fa-{{ $icon }} mr-2"></i>
  @endif
  {{ $text }}
</button>
