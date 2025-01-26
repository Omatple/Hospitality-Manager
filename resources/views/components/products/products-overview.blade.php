@props(['productCollection' => []])

<div class="overflow-hidden rounded-lg shadow-md">
    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Image</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Name</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Price</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Stock</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Category</th>
                <th class="px-4 py-3 text-right text-sm font-medium text-gray-700 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse ($productCollection as $product)
                <x-products.product-row :product="$product" />
            @empty
                <tr>
                    <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                        No products found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if ($productCollection->hasPages())
        <div class="mt-4">
            {{ $productCollection->links() }}
        </div>
    @endif
</div>
