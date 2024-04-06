@extends('layouts.admin-app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <p class="content__title">管理者登録</p>
    <div class="form">
        <form action="/admin/register" method="post">
            @csrf
            <div class="form__item">
                <div class="form__img">
                    <img src="{{ asset('icons/parson.png') }}" alt="">
                </div>
                <input type="text" name="name" placeholder="Adminname" value="{{ old('name') }}">
            </div>
            <div class="form__error">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
            <div class="form__item">
                <div class="form_img">
                    <img src="{{ asset('icons/mail.png') }}" alt="">
                </div>
                <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
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
            <div class="register-button">
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
@endsection
