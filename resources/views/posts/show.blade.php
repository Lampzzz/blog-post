@extends('layouts.app')

@section('content')
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
        <!-- Title -->
        <h1 class="text-3xl font-bold text-primary-600 mb-4">{{ $post->title }}</h1>

        <!-- Author and Date -->
        <div class="flex items-center text-gray-600 text-sm mb-6">
          <span class="mr-4">
            <i class="fas fa-user mr-2"></i>
            {{ $post->user->name }}
          </span>
          <span>
            <i class="fas fa-calendar mr-2"></i>
            {{ $post->created_at->format('M d, Y') }}
          </span>
        </div>

        <!-- Content -->
        <div class="prose max-w-none mb-8">
          {{ $post->content }}
        </div>

        <!-- Divider -->
        <hr class="my-6 border-gray-200">

        <!-- Action Buttons -->
        <div class="flex space-x-4">
          <x-form-button :text="'Edit Post'" :icon="'edit'" variant="primary"
            onclick="window.location.href='{{ route('posts.edit', $post) }}'" />

          <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <x-form-button :text="'Delete Post'" :icon="'trash'" variant="danger" type="submit"
              onclick="return confirm('Are you sure you want to delete this post?')" />
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
