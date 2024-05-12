@extends('layouts.layout-menu')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/member-menu.css') }}">
@endsection

@section('content')
    <a href="/">Menu</a>
    @if (Auth::guard('web')->check())
        <a href="/logout">Logout</a>
        <a href="/mypage">Mypage</a>
    @elseif(Auth::guard('admin')->check())
        <a href="/admin/logout">Logout</a>
        <a class="admin__button" href="/admin/admin-page">AdminPage</a>
    @endif
@endsection
