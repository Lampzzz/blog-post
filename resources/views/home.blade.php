<x-layouts.app>
  <div class="text-center mb-8">
    <h1 class="text-6xl font-bold text-[var(--primary)] mb-3">SimpleBlog</h1>
    <p class="text-xl text-gray-600">Welcome to your simple, modern blog.</p>
  </div>

  <div class="w-full">
    <x-search-input placeholder="Search post by title, summary or tag..." />
  </div>


  @include('posts.index')
</x-layouts.app>
