@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/review-thanks.css') }}">
@endsection

@section('content')
    <div class="content__text">
        <p>レビューありがとうございました！</p>
        <div class="form">
            <form action="/mypage" method="get">
                <button type="submit">myページに戻る</button>
            </form>
        </div>
    </div>
@endsection
