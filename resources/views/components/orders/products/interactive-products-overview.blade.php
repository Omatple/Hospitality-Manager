@props([
    'categoryCollection',
    'user',
    'table',
    'action' => route('orders.store'),
    'methodPut' => false,
    'order' => null,
    'labelSubmit' => 'Save Order',
])

<div class="bg-gray-100 text-gray-800 py-4 px-6 rounded-lg shadow-md flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold">
            Order for {{ $user->first_name }} {{ $user->last_name }}
        </h1>
        <p class="text-sm text-gray-600">
            Table Number: {{ $table->number }}
        </p>
    </div>
</div>
<div class="space-y-6">
    <div class="flex space-x-4 overflow-x-auto py-2 border-b border-gray-300">
        @foreach ($categoryCollection as $category)
            <button onclick="showCategory({{ $category->id }})"
                class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-indigo-600 transition"
                id="category-{{ $category->id }}">
                {{ $category->name }}
            </button>
        @endforeach
    </div>
    <form action="{{ $action }}" method="POST" class="space-y-6">
        @csrf
        @if ($methodPut)
            @method('PUT')
        @endif
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($categoryCollection as $category)
                @foreach ($category->products as $product)
                    <div class="product-card block" data-category="{{ $category->id }}">
                        <x-orders.products.interactive-product-card :product="$product" :order="$order" />
                    </div>
                @endforeach
            @endforeach
        </div>
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="hidden" name="table_id" value="{{ $table->id }}">
        <div class="text-center flex gap-6 justify-center">
            <x-buttons.action-button :label="$labelSubmit" />
            <x-buttons.action-button value="finalize" name="finalize" color="green" label="Finalize Order"
                iconClass="clipboard-list" />
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const firstCategoryId = @json($categoryCollection->sortBy('name')->pluck('id')->first());

        if (firstCategoryId) {
            showCategory(firstCategoryId);
        }
    });

    function showCategory(categoryId) {
        document.querySelectorAll('.product-card').forEach(product => {
            product.style.display = 'none';
        });

        document.querySelectorAll(`.product-card[data-category="${categoryId}"]`).forEach(product => {
            product.style.display = 'block';
        });

        document.querySelectorAll('.flex button').forEach(button => {
            button.classList.remove('text-indigo-600', 'border-b-2', 'border-indigo-600');
        });

        const activeButton = document.getElementById(`category-${categoryId}`);
        if (activeButton) {
            activeButton.classList.add('text-indigo-600', 'border-b-2', 'border-indigo-600');
        }
    }

    function incrementQuantity(productId, maxStock) {
        const input = document.getElementById(`quantity-${productId}`);
        const currentValue = parseInt(input.value) || 0;
        if (currentValue < maxStock) {
            input.value = currentValue + 1;
        }
    }

    function decrementQuantity(productId) {
        const input = document.getElementById(`quantity-${productId}`);
        const currentValue = parseInt(input.value) || 0;
        if (currentValue > 0) {
            input.value = currentValue - 1;
        }
    }
</script>
