@extends('layouts.main')
@section('page_title', 'Update Table')
@section('header_title', 'Update a Table')
@section('header_description', 'Check availability and manage table seating with ease.')
@section('container_classes', 'container mx-auto max-w-lg bg-white p-8 rounded shadow')
@section('content')
    <div class="flex justify-end">
        <x-buttons.link-button :url="route('tables.index')" />
    </div>
    <form action="{{ route('tables.update', $table) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <x-form.input type="number" label="Table Number: " placeholder="Enter table number" :required="true" name="number" :value="$table->number" />
        <div class="flex justify-end space-x-2">
            <x-buttons.action-button color="gray" iconClass="rotate-right" label="Reset" type="reset" />
            <x-buttons.action-button label="Update Changes" />
        </div>
    </form>
@endsection
