@extends('layouts.main')
@section('page_title', 'Update Product')
@section('header_title', 'Update a Product')
@section('header_description', 'Fill out the details below to update a product to your inventory.')
@section('container_classes', 'container mx-auto max-w-lg bg-white p-8 rounded shadow')
@section('content')
    <div class="flex justify-end mb-6">
        <x-buttons.link-button :url="route('products.index')" label="Back to Products" />
    </div>
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <x-form.input name="name" label="Product Name" placeholder="Enter product name" :value="$product->name"
            :required="true" />
        <x-form.textarea-input name="description" label="Description" :value="$product->description"
            placeholder="Enter product description" />
        <x-form.input type="number" name="price" label="Price (€)" :value="$product->price" placeholder="Enter product price"
            :required="true" />
        <x-form.input type="number" name="stock" label="Stock" :value="$product->stock"
            placeholder="Enter product stock quantity" />
        <x-form.image-input name="image" label="Product Image" :defaultImage="Storage::url($product->image)" />
        <x-form.select-input name="category_id" label="Category" :selected="$product->category_id" :options="$categories" :required="true" />
        <div class="flex justify-end space-x-4">
            <x-buttons.action-button color="gray" iconClass="rotate-right" label="Reset" type="reset" />
            <x-buttons.action-button color="blue" iconClass="check" label="Save" />
        </div>
    </form>
@endsection
