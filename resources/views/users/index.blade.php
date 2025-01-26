@extends('layouts.main')
@section('page_title', 'User List')
@section('header_title', 'User Overview')
@section('header_description', 'Manage and organize your users efficiently.')
@section('container_classes', 'container mx-auto px-4 py-4')
@section('content')
    <div class="flex justify-end mb-6">
        <x-buttons.add-button :url="route('users.create')" buttonText="Add User" />
    </div>
    <x-users.user-overview :userCollection="$userCollection" />
@endsection
@section('alert')
    <x-alerts.success-alert />
@endsection
