@props(['order'])

<div
    class="max-w-md mx-auto bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
    <div class="w-full bg-gray-800 border-b-2 border-solid border-white">
        <p class="text-center text-white py-4 text-lg">Order Ticket</p>
    </div>
    <div class="p-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Order by: {{ $order->user->first_name }}
            {{ $order->user->last_name }}</h2>
        <p class="text-gray-600 mb-6 text-lg">Table: {{ $order->table->number }}</p>
        <p class="text-gray-600 mb-6 text-lg">Status: <span
                class="font-bold {{ $order->status === 'pending' ? 'text-yellow-600' : 'text-green-600' }}">{{ ucfirst($order->status) }}</span>
        </p>
        <div class="mt-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-6">Products Ordered:</h3>
            <div class="grid grid-cols-4 text-gray-800 font-semibold border-b pb-4 text-lg">
                <span>Product</span>
                <span>Quantity</span>
                <span>Unit Price</span>
                <span>Total</span>
            </div>
            <ul class="mt-6 space-y-4">
                @foreach ($order->products as $product)
                    <li class="grid grid-cols-4 justify-between text-gray-600 border-b pb-4">
                        <span class="pr-4">{{ $product->name }}</span>
                        <span class="text-center">x{{ $product->pivot->quantity }}</span>
                        <span class="text-right">{{ $product->pivot->unit_price }}€</span>
                        <span class="text-right">{{ $product->pivot->quantity * $product->pivot->unit_price }}€</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="mt-10 pt-6">
            <p class="text-xl font-bold text-indigo-600 text-right">Total: {{ $order->total }}€</p>
        </div>
    </div>
</div>
