@extends('layouts.main')
@section('page_title', 'Interactive Product Selection')
@section('header_title', 'Select Products for Order')
@section('header_description', 'Choose products from the categories below and define their quantities for the order.')
@section('container_classes', 'container mx-auto max-w-4xl bg-white p-8 rounded-lg shadow-md')
@section('content')
    <div class="space-y-6">
        <div class="flex justify-end w-full">
            <x-buttons.link-button :url="route('tables.index')" label="Back to Tables" />
        </div>
        <x-orders.products.interactive-products-overview :categoryCollection="$categoryCollection" :table="$order->table()->first()" :user="$order->user()->first()"
            :order="$order" :methodPut="true" :action="route('orders.update', $order)" labelSubmit="Update Order" />
    </div>
@endsection
