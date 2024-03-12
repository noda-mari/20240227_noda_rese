@extends('layouts.layout-menu')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/member-menu.css') }}">
@endsection

@section('content')
    <a href="/">Menu</a>
    <a href="/logout">Logout</a>
    @can('user')
        <a href="/mypage">Mypage</a>
    @endcan
    @can('register')
        <a class="admin__button" href="/admin">AdminPage</a>
    @endcan
    @can('shop_index')
        <a class="admin__button" href="/shop-data">shopAddPage</a>
    @endcan
@endsection
