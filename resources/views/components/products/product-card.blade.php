@props(['product'])

<div
    class="max-w-sm mx-auto bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
    <div class="w-full bg-[{{ $product->category->colour }}] border-b-2 border-solid border-white">
        <p class="text-center text-white py-2">{{ $product->category->name }}</p>
    </div>
    <img class="w-full h-48 object-cover" src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
    <div class="p-6">
        <h2 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h2>
        <p class="text-gray-600 mt-2">{{ $product->description }}</p>
        <div class="flex items-center justify-between mt-4">
            <span class="text-lg font-bold text-indigo-600">{{ $product->price }}€</span>
            <span class="text-sm {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                {{ $product->stock > 0 ? $product->stock . ' in stock' : 'Out of stock' }}
            </span>
        </div>
    </div>
</div>
