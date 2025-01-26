@props(['userCollection' => []])

<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    @foreach ($userCollection as $user)
        <x-users.user-card :user="$user" />
    @endforeach
</div>
