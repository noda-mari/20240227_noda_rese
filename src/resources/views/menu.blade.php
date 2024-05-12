@extends('layouts.layout-menu')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('content')
    <a href="/">Menu</a>
    @if (!Auth::guard('admin')->check() && !Auth::guard('web')->check())
        <a href="/register">Registration</a>
        <a href="/login">Login</a>
    @elseif(Auth::guard('admin')->check())
        <a href="/admin/logout">Logout</a>
        <a class="admin__button" href="/admin/admin-page">AdminPage</a>
    @endif
@endsection
