@extends('layouts.main')
@section('page_title', 'Table List')
@section('header_title', 'Table Overview')
@section('header_description', 'Check availability and manage table seating with ease.')
@section('container_classes', 'container mx-auto px-4')
@section('content')
    <x-buttons.add-button :url="route('tables.create')" buttonText="Add Table" />
    <x-tables.tables-overview :tableCollection="$tableCollection" />
@endsection
@section('alert')
    <x-alerts.success-alert />
@endsection
