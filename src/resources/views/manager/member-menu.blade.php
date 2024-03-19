@extends('layouts.layout-menu')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('content')
    <a href="/manager/logout">Logout</a>
    <a class="admin__button" href="/manager/shop-data">shopAddPage</a>
@endsection
