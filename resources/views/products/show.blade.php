@extends('layouts.main')
@section('page_title', 'Product Details')
@section('header_title', 'Product Information')
@section('header_description', 'View all the details about this product, including price, stock, and category.')
@section('container_classes', 'container mx-auto px-4 py-8')
@section('content')
    <div class="max-w-3xl mx-auto">
        <x-products.product-card :product="$product" />
        <div class="mt-8 flex justify-center space-x-4">
            <x-buttons.link-button label="Back to Products" :url="route('products.index')" />
            <x-buttons.edit-button :url="route('products.edit', $product)" buttonText="Edit Product" />
        </div>
    </div>
@endsection
