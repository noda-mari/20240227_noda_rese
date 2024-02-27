@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="content__text">
        <p>会員登録ありがとうございます</p>
        <div class="login-form">
            <form action="/login" method="get">
                <button type="submit">ログインする</button>
            </form>
        </div>
    </div>
@endsection
