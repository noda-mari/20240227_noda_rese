@extends('layouts.layout-menu')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('content')
    <a href="/">Menu</a>
    <a href="/register">Registration</a>
    <a href="/login">Login</a>
@endsection
