@extends('layout.app')

@section('title', 'Contact')

{{-- Navbar --}}
@section('navbar')
    <x-navbar></x-navbar>
@endsection

{{-- Main Content --}}
@section('content')
  <x-contact-us-component></x-contact-us-component>
@endsection

{{-- Footer --}}
@section('footer')
  <x-footer-components></x-footer-components>
@endsection