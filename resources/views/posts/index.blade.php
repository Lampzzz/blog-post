@if ($posts->count() > 0)
  <div class="flex space-y-4 flex-col mt-4">
    @foreach ($posts as $post)
      <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300 cursor-pointer">
        <a href="/posts/{{ $post->id }}" class="block no-underline">
          <h1 class="text-xl font-bold text-gray-900 mb-2 no-underline">{{ $post->title }}</h1>
          <div class="flex items-center text-sm text-gray-600 mb-3 no-underline">
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
          <p class="text-gray-700 no-underline">
            {{ \Str::limit($post->content, 150, '...') }}
          </p>
        </a>

        <hr class="my-3 border-gray-200">

        <div class="flex space-x-2">
          @foreach ($post->tags as $tag)
            <div class="p-2 w-fit text-white text-xs rounded-2xl bg-[var(--primary)]">
              {{ $tag }}</div>
          @endforeach
        </div>
      </div>
    @endforeach
  </div>

  <div class="mt-8">
    {{ $posts->links() }}
  </div>
@else
  <div class="h-40 flex items-center justify-center">
    <p>No data found</p>
  </div>
@endif
