@props(['title', 'description'])

<x-layouts.app>
  <div class="min-h-screen flex flex-col justify-center py-12">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <h2 class="text-center text-3xl font-bold text-gray-900">{{ $title }}</h2>
      <p class="mt-2 text-center text-sm text-gray-600">
        {{ $description }}
      </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="bg-white py-8 px-5 shadow sm:rounded-lg sm:px-10">
        {{ $slot }}
      </div>
    </div>
  </div>
</x-layouts.app>
