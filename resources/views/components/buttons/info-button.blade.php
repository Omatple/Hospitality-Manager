@props(['url', 'buttonText'])

<a href="{{ $url }}"
    class="inline-flex items-center px-4 py-2 bg-blue-400 hover:bg-blue-500 text-white font-semibold text-sm rounded shadow-md focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-75 transition">
    <i class="fas fa-info-circle"></i>
    @if ($buttonText !== '')
        <span class="ml-2">{{ $buttonText }}</span>
    @endif
</a>
