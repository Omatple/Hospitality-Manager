@props([
    'logo' => [
        'title' => 'Hospitality Manager',
        'href' => url('/'),
    ],
    'menuItems' => [
        [
            'text' => 'Staff',
            'href' => route('users.index'),
            'icon' => 'users',
        ],
        [
            'text' => 'Tables',
            'href' => route('tables.index'),
            'icon' => 'users',
        ],
        [
            'text' => 'Inventory',
            'href' => route('inventory'),
            'icon' => 'clipboard',
        ],
        [
            'text' => 'Orders',
            'href' => route('orders.index'),
            'icon' => 'clipboard-list',
        ],
    ],
])

<nav class="bg-blue-600 text-white py-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center px-4">
        <a href="{{ $logo['href'] }}" class="text-2xl font-bold">{{ $logo['title'] }}</a>
        <ul class="flex space-x-6">
            @foreach ($menuItems as $item)
                <li><a href="{{ $item['href'] }}" class="hover:text-blue-300"><i class="fas fa-{{ $item['icon'] }}"></i>
                        {{ $item['text'] }}</a></li>
            @endforeach
        </ul>
    </div>
</nav>
