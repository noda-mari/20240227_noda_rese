@extends('layouts.header-layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="content__title">
            <p>店舗代表者作成</p>
        </div>
        <div class="manager__create">
            <ul>
                <li>
                    <label for="name"><input type="text" name="name" id="name"></label>
                </li>
                <li>
                    <label for="email"><input type="email" name="email" id="email"></label>
                </li>
                <li>
                    <label for="pasword"><input type="password" name="password" id="password"></label>
                </li>
            </ul>
        </div>
        <div class=""></div>
    </div>
@endsection
