@extends('layout.app')

@section('title', 'Cara Order')

{{-- Navbar --}}
@section('navbar')
    <x-navbar></x-navbar>
@endsection

{{-- Main Content --}}
@section('content')
    <x-cara-order></x-cara-order>
@endsection

{{-- Footer --}}
@section('footer')
    <x-footer-components></x-footer-components>
@endsection