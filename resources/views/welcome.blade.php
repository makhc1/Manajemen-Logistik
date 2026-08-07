@extends('layouts.app')

@section('content')
    @include('pages.dashboard')
    @include('pages.master')
    @include('pages.inbound')
    @include('pages.outbound')
    @include('pages.warehouses')
    @include('pages.security')
    @include('pages.settings')
    @include('pages.users')
@endsection
