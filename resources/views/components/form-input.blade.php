@props(['type' => 'text', 'label', 'name', 'id', 'placeholder' => '', 'isPassword' => false, 'oldValue'])

<div class="mb-4">
  <label for="{{ $id }}" class="block text-sm font-medium text-gray-700 mb-1">{{ $label }}</label>
  <div class="relative">
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}"
      {{ $attributes->merge(['class' => 'w-full px-4 py-2 bg-[var(--background)] border border-none rounded-md focus:outline-none focus:ring-1 focus:ring-[var(--primary)] focus:border-[var(--primary)] placeholder-gray-400']) }}>
    @if ($isPassword)
      <button type="button" onclick="togglePassword('{{ $id }}')"
        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700">
        <i data-lucide="eye" class="w-5 h-5 password-toggle-icon-{{ $id }}"></i>
      </button>
    @endif
  </div>
  @error($name)
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
  @enderror
</div>

@if ($isPassword)
  <script>
    function togglePassword(inputId) {
      const input = document.getElementById(inputId);
      const icon = document.querySelector(`.password-toggle-icon-${inputId}`);

      if (input.type === 'password') {
        input.type = 'text';
        icon.setAttribute('data-lucide', 'eye-off');
      } else {
        input.type = 'password';
        icon.setAttribute('data-lucide', 'eye');
      }
      lucide.createIcons();
    }
  </script>
@endif
