@extends('layouts.layout-menu')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/member-menu.css') }}">
@endsection

@section('content')
    <a href="/">Menu</a>
    <a href="/logout">Logout</a>
    <a href="/mypage">Mypage</a>
@endsection
