@extends('layouts.app')

@section('content')
    @include('pages.dashboard')
    @include('pages.master')
    @include('pages.inbound')
    @include('pages.outbound')
    @include('pages.warehouses')
    @include('pages.users')
@endsection
