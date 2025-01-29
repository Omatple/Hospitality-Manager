@extends('layouts.main')
@section('page_title', 'Inventory')
@section('header_title', 'Manage Inventory')
@section('header_description', 'Easily manage your categories and products to keep your inventory up to date.')
@section('container_classes', 'container mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 px-6 py-8')
@section('content')
    <x-items.link-big-card title="Categories" color="blue" icon="tags" :url="route('categories.index')"
        description="Organize your categories to structure your inventory effectively." />
    <x-items.link-big-card title="Products" color="green" icon="box" :url="route('products.index')"
        description="Add, update, and manage all products in your inventory." />
@endsection
