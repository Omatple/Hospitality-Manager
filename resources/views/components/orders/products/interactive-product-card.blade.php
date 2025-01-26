@props(['product', 'order'])

<div class="relative bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 cursor-pointer flex flex-col h-[350px] max-w-sm mx-auto"
    onclick="incrementQuantity({{ $product->id }}, {{ $product->stock }})">
    <img class="w-full h-[150px] object-cover rounded-t-lg" src="{{ Storage::url($product->image) }}"
        alt="{{ $product->name }}">

    <div class="flex-grow p-4 flex flex-col justify-between">
        <div>
            <h2 class="text-lg font-bold text-gray-800">{{ $product->name }}</h2>
            <p class="text-sm text-gray-600">Stock: {{ $product->stock }}</p>
        </div>
        <div class="my-4 text-center">
            <span class="text-2xl font-semibold text-blue-600">{{ $product->price }}€</span>
        </div>
    </div>

    <div class="p-4 flex items-center justify-center space-x-4">
        <button type="button"
            class="w-8 h-8 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition"
            onclick="event.stopPropagation(); decrementQuantity({{ $product->id }}, {{ $product->stock }})">
            -
        </button>
        <input id="quantity-{{ $product->id }}" name="{{ $product->id }}" type="number"
            value="{{ $order?->products->firstWhere('id', $product->id)?->pivot->quantity ?? 0 }}" min="0"
            max="{{ $product->stock }}" readonly
            class="w-16 text-center border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        <button type="button"
            class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition"
            onclick="event.stopPropagation(); incrementQuantity({{ $product->id }}, {{ $product->stock }})">
            +
        </button>
    </div>
</div>
