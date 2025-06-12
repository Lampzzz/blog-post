<div class="flex space-y-4 flex-col mt-4">
  @foreach ($posts as $post)
    <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
      <a href="/posts/{{ $post->id }}" class="block no-underline">
        <h1 class="text-xl font-bold text-gray-900 mb-2 no-underline">{{ $post->title }}</h1>
        <div class="flex items-center text-sm text-gray-600 mb-3 no-underline">
          <span>{{ $post->user->name }}</span>
          <span class="mx-2">&middot;</span>
          <span>{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</span>
        </div>
        <p class="text-gray-700 no-underline">
          {{ \Str::limit($post->content, 150, '...') }}
        </p>
      </a>
    </div>
  @endforeach
</div>
