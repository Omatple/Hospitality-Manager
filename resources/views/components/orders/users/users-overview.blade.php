@props(['userCollection', 'table'])

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach ($userCollection as $user)
        <x-orders.users.user-card :user="$user" :table="$table" />
    @endforeach
</div>
