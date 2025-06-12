@props(['placeholder' => 'Search...'])

<div class="relative">
  <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
    <i data-lucide="search" class="w-5 h-5 text-gray-400"></i>
  </div>
  <input type="text" placeholder="{{ $placeholder }}"
    {{ $attributes->merge([
        'class' =>
            'w-full pl-10 pr-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-[var(--primary)] focus:ring-1 focus:ring-[var(--primary)]',
    ]) }}>
</div>
