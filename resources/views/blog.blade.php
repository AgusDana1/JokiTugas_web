@extends('layout.app')

@section('title', 'Blog')

{{-- Navbar --}}
@section('navbar')
    <x-navbar></x-navbar>
@endsection

{{-- Main Content --}}
@section('content')
    <x-blog-component></x-blog-component>
@endsection

{{-- Footer --}}
@section('footer')
    <x-footer-components></x-footer-components>
@endsection