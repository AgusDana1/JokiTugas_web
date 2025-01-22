@extends('layout.app')

@section('title', 'Home Page')

{{-- Navbar --}}
@section('navbar')
    <x-navbar></x-navbar>
@endsection

{{-- Main Content --}}
@section('content')
    <x-content></x-content>
@endsection

{{-- Footer --}}
@section('footer')

@endsection