@extends('layouts.main')
@section('page_title', 'Product List')
@section('header_title', 'Product Overview')
@section('header_description', 'Manage and review your product inventory with ease.')
@section('container_classes', 'container mx-auto px-4')
@section('content')
    <x-buttons.add-button :url="route('products.create')" buttonText="Add Product" />
    <x-products.products-overview :productCollection="$productCollection" />
@endsection
@section('alert')
    <x-alerts.success-alert />
@endsection
