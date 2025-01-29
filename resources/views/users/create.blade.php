@extends('layouts.main')
@section('page_title', 'Add User')
@section('header_title', 'Add a User')
@section('header_description', 'Fill out the details below to add a new user to your system.')
@section('container_classes', 'container mx-auto max-w-lg bg-white p-8 rounded-lg shadow-md')
@section('content')
    <div class="flex justify-end mb-6">
        <x-buttons.link-button :url="route('users.index')" label="Back to Users" />
    </div>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <x-form.input name="first_name" label="First Name" placeholder="Enter first name" :required="true" />
        <x-form.input name="last_name" label="Last Name" placeholder="Enter last name" :required="true" />
        <x-form.input type="email" name="email" label="Email Address" placeholder="Enter email address"
            :required="true" />
        <x-form.input type="password" name="password" label="Password" placeholder="Enter password" :required="true" />
        <x-form.select-input name="role" label="Role" :options="['waiter' => 'waiter', 'bartender' => 'bartender', 'barista' => 'barista']" :required="true" />
        <x-form.image-input name="image" label="Profile Picture" :defaultImage="Storage::url('users/default.png')" />
        <div class="flex justify-end space-x-4">
            <x-buttons.action-button color="gray" iconClass="rotate-right" label="Reset" type="reset" />
            <x-buttons.action-button color="blue" iconClass="check" label="Save" />
        </div>
    </form>
@endsection
