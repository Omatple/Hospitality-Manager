@props(['url', 'buttonText'])

<form action="{{ $url }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
    @csrf
    @method('DELETE')
    <button type="submit"
        class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold text-sm rounded shadow-md focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 transition">
        <i class="fas fa-trash"></i>
        @if ($buttonText !== '')
            <span class="ml-2">{{ $buttonText }}</span>
        @endif
    </button>
</form>
