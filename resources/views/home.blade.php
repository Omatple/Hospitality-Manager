@extends('layouts.main')
@section('page_title', 'Home')
@section('header_title', 'Welcome to Hospitality Manager')
@section('header_description', 'Streamline your hospitality operations with ease.')
@section('container_classes', 'container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4')
@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
        <i class="fas fa-user-tie text-blue-500 text-4xl"></i>
        <h2 class="mt-4 text-xl font-bold">Staff Management</h2>
        <p class="mt-2 text-gray-600">Manage roles, shifts, and staff performance easily.</p>
        <a href="{{ route('users.index') }}"
            class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">Explore</a>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
        <i class="fas fa-chair text-green-500 text-4xl"></i>
        <h2 class="mt-4 text-xl font-bold">Table Selection</h2>
        <p class="mt-2 text-gray-600">Choose a table, take orders and track them efficiently.</p>
        <a href="{{ route('tables.index') }}"
            class="inline-block mt-4 bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700">Explore</a>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition">
        <i class="fas fa-clipboard-list text-yellow-500 text-4xl"></i>
        <h2 class="mt-4 text-xl font-bold">Inventory</h2>
        <p class="mt-2 text-gray-600">Keep track of stock and supplies efficiently.</p>
        <a href="{{ route('products.index') }}"
            class="inline-block mt-4 bg-yellow-600 text-white px-4 py-2 rounded shadow hover:bg-yellow-700">Explore</a>
    </div>
@endsection
