@props(['user'])

<div
    class="max-w-sm mx-auto bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
    <div class="relative">
        <img class="w-full h-40 object-cover rounded-t-lg" src="{{ Storage::url($user->image) }}" alt="User Image">
        <div class="absolute top-0 right-0 bg-indigo-600 text-white text-sm font-bold px-3 py-1 rounded-bl-lg">
            {{ ucfirst($user->role) }}
        </div>
    </div>
    <div class="p-6 h-[130px]">
        <h2 class="text-xl font-semibold text-gray-800">
            {{ $user->first_name }} {{ $user->last_name }}
        </h2>
        <p class="text-gray-600 text-sm">{{ $user->email }}</p>
    </div>
    <x-items.action-buttons :deleteUrl="route('users.destroy', $user)" :editUrl="route('users.edit', $user)"
        class="border-t border-gray-200 p-4 flex justify-between items-center" editButtonText="Edit"
        deleteButtonText="Delete" />
</div>
