@extends('layouts.layout-menu')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('content')
    <a href="/">Menu</a>
    <a href="/admin/logout">Logout</a>
    <a class="admin__button" href="/admin/admin-page">AdminPage</a>
@endsection
