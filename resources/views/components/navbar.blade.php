<?php
use Illuminate\Support\Facades\Vite;
?>

<nav class="bg-[var(--primary)] shadow-sm">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex items-center">
        <a href="/" class="text-2xl font-semibold text-white inline-flex items-center">
          <i data-lucide="pen-square" class="w-7 h-7 mr-2"></i>
          SimpleBlog
        </a>
      </div>

      <div class="flex items-center space-x-2">
        <x-nav-link href="/" :active="request()->is('/')" text="Home" icon="home" />
        @guest
          <x-nav-link href="/login" :active="request()->is('login')" text="Login" icon="log-in" />
          <x-nav-link href="/register" :active="request()->is('register')" text="Register" icon="user-plus" />
        @endguest
        @auth
          <x-nav-link href="/profile" :active="request()->is('profile')" text="Profile" icon="user" />
        @endauth
      </div>
    </div>
  </div>
</nav>
