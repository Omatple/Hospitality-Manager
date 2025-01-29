@props(['order'])

<tr class="bg-white border-b hover:bg-gray-50 transition">
    <td class="px-4 py-3 text-gray-800 font-semibold">
        {{ $order->user->first_name }} {{ $order->user->last_name }}
    </td>
    <td class="px-4 py-3 text-gray-600">
        {{ $order->table->number }}
    </td>
    <td class="px-4 py-3 text-gray-600">
        <span class="font-bold {{ $order->status === 'pending' ? 'text-yellow-600' : 'text-green-600' }}">
            {{ ucfirst($order->status) }}
        </span>
    </td>
    <td class="px-4 py-3 text-gray-800 font-bold">
        {{ $order->total }}€
    </td>
    <td class="px-4 py-3 text-right space-x-2">
        <x-items.action-buttons :editShowButton="false" :deleteUrl="route('orders.destroy', $order)" :infoShowButton="true" :infoUrl="route('orders.show', $order)" />
    </td>
</tr>
