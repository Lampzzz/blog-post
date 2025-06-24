<x-layouts.app>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="text-3xl font-bold text-primary-600 mb-4">{{ $post->title }}</h1>

        <div class="flex items-center text-gray-600 text-sm mb-6">
          <div class="flex space-x-2">
            <x-icon name="user-circle" />
            <span>{{ $post->user->name }}</span>
          </div>
          <span class="mx-2">&middot;</span>
          <div class="flex space-x-2">
            <x-icon name="calendar" />
            <span>{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</span>
          </div>
        </div>

        <div class="prose max-w-none mb-8">
          {{ $post->content }}
        </div>

        <x-divider />
        <div class="flex space-x-2 mb-4 items-center">
          <i data-lucide="tags" class="w-6 h-6 text-[var(--primary)]"></i>
          <h1 class="text-xl font-semibold">Tags:</h1>
        </div>

        <div class="flex space-x-2">
          @foreach ($post->tags as $tag)
            <x-tags>{{ $tag }}</x-tags>
          @endforeach
        </div>

        @can('manage-post', $post)
          <x-divider />
          <div class="flex space-x-4">
            <x-form-button :text="'Edit Post'" :icon="'edit'" variant="primary"
              onclick="window.location.href='/posts/{{ $post->id }}/edit'" />

            <form action="/posts/{{ $post->id }}" method="POST" class="inline">
              @csrf
              @method('DELETE')
              <x-form-button :text="'Delete Post'" :icon="'trash'" variant="danger" type="submit"
                onclick="return confirm('Are you sure you want to delete this post?')" />
            </form>
          </div>
        @endcan
      </div>
    </div>
  </div>

</x-layouts.app>
