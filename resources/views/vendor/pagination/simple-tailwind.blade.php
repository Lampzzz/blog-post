@if ($paginator->hasPages())
  <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
      <span
        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
        {!! __('pagination.previous') !!}
      </span>
    @else
      <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[var(--primary)] border border-transparent leading-5 rounded-md hover:bg-[var(--primary-dark)] focus:outline-none focus:ring-2 focus:ring-[var(--primary)] focus:ring-offset-2 active:bg-[var(--primary-dark)] transition ease-in-out duration-150">
        {!! __('pagination.previous') !!}
      </a>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
      <a href="{{ $paginator->nextPageUrl() }}" rel="next"
        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[var(--primary)] border border-transparent leading-5 rounded-md hover:bg-[var(--primary-dark)] focus:outline-none focus:ring-2 focus:ring-[var(--primary)] focus:ring-offset-2 active:bg-[var(--primary-dark)] transition ease-in-out duration-150">
        {!! __('pagination.next') !!}
      </a>
    @else
      <span
        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
        {!! __('pagination.next') !!}
      </span>
    @endif
  </nav>
@endif
