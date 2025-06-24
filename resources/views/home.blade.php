<x-layouts.app>
  <div class="text-center mb-8">
    <h1 class="text-6xl font-bold text-[var(--primary)] mb-3">SimpleBlog</h1>
    <p class="text-xl text-gray-600">Welcome to your simple, modern blog.</p>
  </div>

  <form action="/search" method="POST" class="flex space-x-2">
    @csrf
    <x-search-input placeholder="Search post by title, summary or tag..." name="postsSearch" />
    <button type="submit"
      class="flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[var(--primary)] hover:bg-[var(--primary-dark)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary)]">
      Search
    </button>
  </form>

  @include('posts.index', ['posts' => $posts])
</x-layouts.app>
