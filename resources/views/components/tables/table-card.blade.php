@props(['table'])

<div onclick="window.location.href='{{ route('orders.create.selectUser', $table) }}'"
    class="table-card bg-{{ $table->status === 'available' ? 'green' : 'red' }}-500 text-white rounded-lg shadow-lg flex flex-col justify-center items-center pb-6 w-full h-full">
    <x-items.action-buttons :deleteUrl="route('tables.destroy', $table)" :editUrl="route('tables.edit', $table)" />
    <i class="fas fa-chair text-4xl"></i>
    <span class="text-2xl font-bold mt-2">Table: {{ $table->number }}</span>
    <span class="text-sm mt-2">{{ ucfirst($table->status) }}</span>
</div>
