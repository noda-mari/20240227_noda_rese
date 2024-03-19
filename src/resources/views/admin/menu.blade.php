@extends('layouts.layout-menu')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('content')
    <a href="/admin/register">Registration</a>
    <a href="/admin/login">Login</a>
@endsection
