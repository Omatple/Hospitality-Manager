@extends('layouts.main')
@section('page_title', 'Product List')
@section('header_title', 'Product Overview')
@section('header_description', 'Manage and review your product inventory with ease.')
@section('container_classes', 'container mx-auto px-4')
@section('content')
    <div class="flex justify-end mb-4 gap-6">
        @if ($isCategoryFiltered)
            <x-buttons.link-button iconClass="box-open" color="gray" label="View All Products" :url="route('products.index')" />
        @endif
        <x-buttons.link-button iconClass="layer-group" color="purple" label="View Categories" :url="route('categories.index')" />
    </div>
    <x-buttons.add-button :url="route('products.create')" buttonText="Add Product" />
    <x-products.products-overview :productCollection="$productCollection" />
@endsection
@section('alert')
    <x-alerts.success-alert />
@endsection
