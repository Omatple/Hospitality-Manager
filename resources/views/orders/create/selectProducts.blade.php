@extends('layouts.main')
@section('page_title', 'Interactive Product Selection')
@section('header_title', 'Select Products for Order')
@section('header_description',
    'Choose products from the categories below and define their quantities for the new
    order.')
@section('container_classes', 'container mx-auto max-w-4xl bg-white p-8 rounded-lg shadow-md')
@section('content')
    <div class="space-y-6">
        <div class="flex justify-end w-full">
            <x-buttons.link-button :url="route('tables.index')" label="Back to Tables" />
        </div>
        <x-orders.products.interactive-products-overview :categoryCollection="$categoryCollection" :table="$table" :user="$user" />
    </div>
@endsection
