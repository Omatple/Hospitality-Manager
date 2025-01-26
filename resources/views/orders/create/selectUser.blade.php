    @extends('layouts.main')
    @section('page_title', 'Select User')
    @section('header_title', 'Select a User')
    @section('header_description', 'Choose a user to associate with the new order.')
    @section('container_classes', 'container mx-auto px-4 py-6')
    @section('content')
        <x-orders.users.users-overview :userCollection="$userCollection" :table="$table" />
    @endsection
