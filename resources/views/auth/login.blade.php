<x-layouts.auth title="Welcome back!" description="Sign in to your account to continue">
  <form class="space-y-6" action="/login" method="POST">
    @csrf

    @error('auth')
      <div class="rounded-md bg-red-50 p-4 mb-4">
        <div class="flex">
          <div class="ml-3">
            <p class="text-sm font-medium text-red-800">{{ $message }}</p>
          </div>
        </div>
      </div>
    @enderror

    <x-form-input type="email" label="Email address" name="email" id="email" placeholder="Enter your email" />

    <x-form-input type="password" label="Password" name="password" id="password" placeholder="Enter your password"
      isPassword="true" />

    <div>
      <button type="submit"
        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[var(--primary)] hover:bg-[var(--primary-dark)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary)]">
        Sign in
      </button>
    </div>
  </form>

  <div class="mt-6 text-center text-sm">
    <p class="text-gray-600">
      Don't have an account?
      <a href="/register" class="font-medium text-[var(--primary)] hover:text-[var(--primary-dark)]">
        Register here
      </a>
    </p>
  </div>
</x-layouts.auth>
