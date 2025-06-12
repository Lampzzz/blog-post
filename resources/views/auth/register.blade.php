<x-layouts.auth title="Create an account" description="Join our community and start sharing your stories">
  <form class="space-y-6" action="/register" method="POST">
    @csrf

    <x-form-input type="text" label="Full name" name="name" id="name" placeholder="Enter your full name"
      :value="old('name')" />

    <x-form-input type="email" label="Email address" name="email" id="email" placeholder="Enter your email"
      :value="old('email')" />

    <x-form-input type="password" label="Password" name="password" id="password" placeholder="Create a password"
      isPassword="true" />

    <x-form-input type="password" label="Confirm password" name="password_confirmation" id="password_confirmation"
      placeholder="Confirm your password" isPassword="true" />

    <div>
      <button type="submit"
        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[var(--primary)] hover:bg-[var(--primary-dark)] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[var(--primary)]">
        Create account
      </button>
    </div>
  </form>

  <div class="mt-6 text-center text-sm">
    <p class="text-gray-600">
      Already have an account?
      <a href="/login" class="font-medium text-[var(--primary)] hover:text-[var(--primary-dark)]">
        Sign in here
      </a>
    </p>
  </div>
</x-layouts.auth>
