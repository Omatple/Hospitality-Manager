@props(['category'])

<div
    class="relative w-full h-40 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
    <div class="absolute inset-0 bg-[{{ $category->colour }}]"></div>
    <div class="absolute flex justify-between w-full z-10">
        <a href="{{ route('products.index', ['category_id' => $category->id]) }}"
            class="mt-4 ml-2 inline-flex items-center px-4 h-[30px] bg-gray-500 hover:bg-gray-400 text-white font-semibold text-sm rounded shadow-md focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-opacity-75 transition">
            <i class="fas fa-shopping-cart"></i>
            <span class="ml-2">Show</span>
        </a>
        <x-items.action-buttons :editUrl="route('categories.edit', $category)" :deleteUrl="route('categories.destroy', $category)" />
    </div>
    <div class="relative flex justify-center items-center h-full">
        <h2 class="text-white text-lg font-bold uppercase tracking-wide text-center">
            {{ $category->name }}
        </h2>
    </div>
</div>
