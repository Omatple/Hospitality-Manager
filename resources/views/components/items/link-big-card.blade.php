@props(['url' => '#', 'icon' => 'box', 'title' => '', 'description' => '', 'color' => 'gray'])

@php
    $validColors = ['blue', 'green', 'red', 'yellow', 'indigo', 'purple', 'gray'];
    $color = in_array($color, $validColors) ? $color : 'gray';
@endphp
<a href="{{ $url }}"
    class="group relative block w-full max-w-sm h-64 mx-auto bg-gradient-to-r from-blue-500 to-green-500 rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:scale-105 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
    <div class="absolute inset-0 opacity-75 bg-{{ $color }}-900 group-hover:opacity-50 transition duration-300">
    </div>
    <div class="relative flex flex-col justify-center items-center h-full p-6 text-white text-center">
        <i class="fas fa-{{ $icon }} text-6xl mb-4"></i>
        <h2 class="text-2xl font-bold">{{ $title }}</h2>
        <p class="text-sm mt-2">{{ $description }}</p>
    </div>
</a>
