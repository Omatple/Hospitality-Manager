@props([
    'url' => '#',
    'color' => 'red',
    'iconClass' => 'backward',
    'label' => 'Go Back',
])

@php
    $validColors = ['blue', 'green', 'red', 'yellow', 'indigo', 'purple', 'gray'];
    $color = in_array($color, $validColors) ? $color : 'red';
@endphp

<a href="{{ $url }}"
    class="inline-flex items-center px-4 py-2 
           bg-{{ $color }}-500 hover:bg-{{ $color }}-600 
           text-white font-semibold text-sm rounded shadow-md 
           focus:outline-none focus:ring-2 focus:ring-{{ $color }}-400 focus:ring-opacity-75 transition">
    @if ($iconClass !== '')
        <i class="fas fa-{{ $iconClass }} mr-2"></i>
    @endif
    @if ($label !== '')
        <span>{{ $label }}</span>
    @endif
</a>
