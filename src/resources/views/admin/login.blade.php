@extends('layouts.admin-app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <p class="content__title">Admin&nbsp;Login</p>
    <div class="form">
        <form action="/admin/login" method="post">
            @csrf
            <div class="form__item">
                <div class="form__img">
                    <img src="{{ asset('icons/mail.png') }}" alt="">
                </div>
                <input type="text" name="email" placeholder="Email">
            </div>
            <div class="form__error">
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="form__item">
                <div class="form__img">
                    <img src="{{ asset('icons/key.png') }}" alt="">
                </div>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form__error">
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            <div class="login-button">
                <button type="submit">ログイン</button>
            </div>
        </form>
    </div>
@endsection
