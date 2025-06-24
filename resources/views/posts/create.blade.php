<x-layouts.app>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <h1 class="text-3xl font-bold text-primary-600 mb-6">Create Post</h1>

        <form action="/posts" method="POST" class="space-y-6">
          @csrf

          <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}"
              class="w-full px-4 py-2 bg-[var(--background)] border border-none rounded-md focus:outline-none focus:ring-1 focus:ring-[var(--primary)] focus:border-[var(--primary)] placeholder-gray-400"
              placeholder="Enter title">
            @error('title')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
            <textarea name="content" id="content" rows="10" placeholder="Write something..."
              class="w-full px-4 py-2 bg-[var(--background)] border border-none rounded-md focus:outline-none focus:ring-1 focus:ring-[var(--primary)] focus:border-[var(--primary)] placeholder-gray-400">{{ old('content') }}</textarea>
            @error('content')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-4">
            <label for="tags" class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
            <input name="tags" id="tags" placeholder="Seperate by comma (Ex... LIfe, School, Love)"
              class="w-full px-4 py-2 bg-[var(--background)] border border-none rounded-md focus:outline-none focus:ring-1 focus:ring-[var(--primary)] focus:border-[var(--primary)] placeholder-gray-400">{{ old('tags') }}</input>
            @error('tags')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <div class="flex space-x-4">
            <button type="submit"
              class="flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[var(--primary)] hover:bg-[var(--primary-dark)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary)]">
              Submit
            </button> <a href="/"
              class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 transition ease-in-out duration-150">
              <i class="fas fa-times mr-2"></i>
              Cancel
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-layouts.app>
