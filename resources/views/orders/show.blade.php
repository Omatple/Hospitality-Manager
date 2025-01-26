@extends('layouts.main')
@section('page_title', 'Order Details')
@section('header_title', 'Order Information')
@section('header_description', 'View all the details about this order, including customer, table, and products.')
@section('container_classes', 'container mx-auto px-4 py-8')
@section('content')
    <div class="max-w-3xl mx-auto">
        <x-orders.order-card :order="$order" />
        <div class="mt-8 flex justify-center space-x-4">
            <x-buttons.link-button label="Back to Orders" :url="route('orders.index')" />
            <x-buttons.delete-button :url="route('orders.destroy', $order)" buttonText="Delete Order" />
        </div>
    </div>
@endsection
