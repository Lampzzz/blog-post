<x-layouts.app>
  <div class="max-w-2xl mx-auto">
    <div class="bg-white shadow rounded-lg p-6">
      <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-[var(--primary)]">Profile</h1>
        <form action="/logout" method="POST" class="inline">
          @csrf
          <button type="submit"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[var(--primary)] hover:bg-[var(--primary-dark)] rounded-md transition-colors duration-200">
            <i data-lucide="log-out" class="w-4 h-4 mr-2"></i>
            Logout
          </button>
        </form>
      </div>

      <div class="space-y-6">
        <!-- User Information -->
        <div class="space-y-8">
          <!-- Profile Circle -->
          <div class="flex justify-center">
            <div
              class="w-24 h-24 rounded-full bg-[var(--primary)] flex items-center justify-center text-white text-3xl font-bold">
              {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
          </div>

          <!-- User Details Form -->
          <div class="space-y-4">
            <div class="relative">
              <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
              <div class="flex items-center bg-[var(--background)] px-4 py-2 rounded-md">
                <i data-lucide="user" class="w-5 h-5 text-gray-400 mr-2"></i>
                <input type="text" value="{{ auth()->user()->name }}"
                  class="bg-transparent w-full focus:outline-none" readonly>
              </div>
            </div>

            <div class="relative">
              <label class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
              <div class="flex items-center bg-[var(--background)] px-4 py-2 rounded-md">
                <i data-lucide="mail" class="w-5 h-5 text-gray-400 mr-2"></i>
                <input type="email" value="{{ auth()->user()->email }}"
                  class="bg-transparent w-full focus:outline-none" readonly>
              </div>
            </div>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex space-x-4 pt-6 border-t border-gray-200">
          <a href=""
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[var(--primary)] hover:bg-[var(--primary-dark)] rounded-md transition-colors duration-200">
            <i data-lucide="edit" class="w-4 h-4 mr-2"></i>
            Edit Profile
          </a>

          <button type="button" onclick="confirmDelete()"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-md transition-colors duration-200 cursor-pointer">
            <i data-lucide="trash-2" class="w-4 h-4 mr-2"></i>
            Delete Account
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Account Modal -->
  <div id="deleteModal"
    class="opacity-0 pointer-events-none fixed inset-0 flex items-center justify-center transition-opacity duration-300">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4 relative z-10">
      <h3 class="text-lg font-bold text-gray-900 mb-4">Delete Account</h3>
      <p class="text-gray-600 mb-6">Are you sure you want to delete your account? This action cannot be undone.</p>
      <div class="flex space-x-4">
        <form action="" method="POST" class="inline">
          @csrf
          @method('DELETE')
          <button type="submit"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-md transition-colors duration-200 cursor-pointer">
            Confirm Delete
          </button>
        </form>
        <button type="button" onclick="closeDeleteModal()"
          class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-md transition-colors duration-200 cursor-pointer">
          Cancel
        </button>
      </div>
    </div>
  </div>

  <script>
    function confirmDelete() {
      const modal = document.getElementById('deleteModal');
      modal.classList.remove('opacity-0', 'pointer-events-none');
    }

    function closeDeleteModal() {
      const modal = document.getElementById('deleteModal');
      modal.classList.add('opacity-0', 'pointer-events-none');
    }

    // Close modal when clicking outside
    document.getElementById('deleteModal').addEventListener('click', function(e) {
      if (e.target === this) {
        closeDeleteModal();
      }
    });
  </script>
</x-layouts.app>
