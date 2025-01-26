@props(['url', 'buttonText' => 'Add'])

<div class="flex justify-end mb-4 w-full">
    <a href="{{ $url }}"
        class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold text-sm rounded shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition">
        <i class="fas fa-plus"></i>
        @if ($buttonText !== '')
            <span class="ml-2">{{ $buttonText }}</span>
        @endif
    </a>
</div>
