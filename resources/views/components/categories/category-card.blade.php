@props(['category'])

<div
    class="relative w-full h-40 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl">
    <div class="absolute inset-0 bg-[{{ $category->colour }}]"></div>

    <div class="absolute w-full z-10">
        <x-items.action-buttons :editUrl="route('categories.edit', $category)" :deleteUrl="route('categories.destroy', $category)" />
    </div>

    <div class="relative flex justify-center items-center h-full">
        <h2 class="text-white text-lg font-bold uppercase tracking-wide text-center">
            {{ $category->name }}
        </h2>
    </div>
</div>
