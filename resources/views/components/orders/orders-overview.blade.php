@props(['orderCollection' => []])

<div class="overflow-hidden rounded-lg shadow-md">
    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Order By</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Table</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Status</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-700 uppercase tracking-wider">Total</th>
                <th class="px-4 py-3 text-right text-sm font-medium text-gray-700 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @forelse ($orderCollection as $order)
                <x-orders.order-row :order="$order" />
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                        No orders found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    @if ($orderCollection->hasPages())
        <div class="mt-4">
            {{ $orderCollection->links() }}
        </div>
    @endif
</div>
