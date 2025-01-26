@extends('layouts.main')
@section('page_title', 'Category List')
@section('header_title', 'Category Overview')
@section('header_description', 'Explore and manage all your categories efficiently.')
@section('container_classes', 'container mx-auto px-4 py-6')
@section('content')
    <div class="flex justify-end">
        <x-buttons.add-button :url="route('categories.create')" buttonText="Add Category" />
    </div>

    <x-categories.categories-overview :categoryCollection="$categoryCollection" />
@endsection

@section('alert')
    <x-alerts.success-alert />
@endsection
