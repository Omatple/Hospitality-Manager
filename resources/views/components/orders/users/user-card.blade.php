@props(['user', 'table'])

<div onclick="window.location.href='{{ route('orders.create.selectProducts', ['table' => $table, 'user' => $user]) }}'"
    class="cursor-pointer relative max-w-sm mx-auto bg-gradient-to-b from-indigo-500 to-indigo-700 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden">
    <div class="relative h-40">
        <img class="w-full h-full object-cover opacity-80 hover:opacity-100 transition-opacity duration-300"
            src="{{ Storage::url($user->image) }}" alt="{{ $user->first_name }} {{ $user->last_name }}">
        <div class="absolute inset-0 bg-gradient-to-t from-black to-transparent opacity-60"></div>
    </div>
    <div class="absolute top-4 left-4 bg-indigo-600 text-white text-xs font-semibold py-1 px-3 rounded-full shadow-md">
        {{ ucfirst($user->role) }}
    </div>
    <div class="p-6 bg-white rounded-b-lg h-[100px]">
        <h2 class="text-lg font-bold text-gray-800 text-center">
            {{ $user->first_name }} {{ $user->last_name }}
        </h2>
    </div>
</div>
