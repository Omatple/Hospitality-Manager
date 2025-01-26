@props(['url', 'buttonText'])

<a href="{{ $url }}"
    class="inline-flex items-center px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-semibold text-sm rounded shadow-md focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75 transition">
    <i class="fas fa-edit"></i>
    @if ($buttonText !== '')
        <span class="ml-2">{{ $buttonText }}</span>
    @endif
</a>
