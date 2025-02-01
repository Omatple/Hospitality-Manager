@props(['product'])

<tr class="bg-white border-b hover:bg-gray-50 transition">
    <td class="px-4 py-3">
        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}"
            class="w-16 h-16 object-cover rounded shadow-md" />
    </td>
    <td class="px-4 py-3 text-gray-800 font-semibold">
        {{ $product->name }}
    </td>
    <td class="px-4 py-3 text-gray-600">
        {{ $product->price . '€' }}
    </td>
    <td class="px-4 py-3">
        <span
            class="px-2 py-1 rounded-full text-sm font-medium 
                   {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
            {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
        </span>
    </td>
    <td class="px-4 py-3">
        <span onclick="window.location.href = '{{ route('products.index', $product->category_id) }}'"
            class="cursor-pointer px-2 py-1 rounded-full text-sm font-medium bg-[{{ $product->category->colour }}] text-gray-100">
            {{ $product->category->name }}
        </span>
    </td>
    <td class="px-4 py-3 text-right space-x-2">
        <x-items.action-buttons :editUrl="route('products.edit', $product)" :deleteUrl="route('products.destroy', $product)" :infoUrl="route('products.show', $product)" :infoShowButton="true" />
    </td>
</tr>
