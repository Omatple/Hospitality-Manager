@extends('layouts.main')
@section('page_title', 'Order List')
@section('header_title', 'Order Overview')
@section('header_description', 'Manage and organize your orders efficiently.')
@section('container_classes', 'container mx-auto px-4 py-4')
@section('content')
    <x-orders.orders-overview :orderCollection="$orderCollection" />
@endsection
@section('alert')
    <x-alerts.success-alert />
@endsection
