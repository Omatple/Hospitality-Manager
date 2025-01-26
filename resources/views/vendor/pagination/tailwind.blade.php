@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center space-x-2 mt-6">
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md cursor-not-allowed" aria-hidden="true">
                &laquo;
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                aria-label="Previous Page">
                &laquo;
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-4 py-2 text-gray-500">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 bg-blue-600 text-white rounded-md"
                            aria-current="page">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}"
                            class="px-4 py-2 bg-white text-gray-700 rounded-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                            aria-label="Go to page {{ $page }}">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                aria-label="Next Page">
                &raquo;
            </a>
        @else
            <span class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md cursor-not-allowed" aria-hidden="true">
                &raquo;
            </span>
        @endif
    </nav>

    <div class="mt-4 h-2 bg-gray-200 rounded-full">
        <div class="h-full bg-blue-600 rounded-full"
            style="width: {{ ($paginator->currentPage() / $paginator->lastPage()) * 100 }}%;"></div>
    </div>
@endif
