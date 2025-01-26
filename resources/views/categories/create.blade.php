@extends('layouts.main')
@section('page_title', 'Add Category')
@section('header_title', 'Add a Category')
@section('header_description', 'Fill out the details below to add a new category.')
@section('container_classes', 'container mx-auto max-w-lg bg-white p-8 rounded shadow')
@section('content')
    <div class="flex justify-end">
        <x-buttons.link-button :url="route('categories.index')" />
    </div>
    <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
        @csrf
        <x-form.input type="text" label="Name: " placeholder="Enter category name" :required="true" name="name" />

        <x-form.color-picker label="Choose a color: " name="colour" />

        <div class="flex justify-end space-x-2">
            <x-buttons.action-button color="gray" iconClass="rotate-right" label="Reset" type="reset" />
            <x-buttons.action-button />
        </div>
    </form>
@endsection
