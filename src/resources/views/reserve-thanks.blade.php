@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/reserve-thanks.css') }}">
@endsection

@section('content')
    <div class="content__text">
        <p>ご予約ありがとうございます</p>
        <div class="back-button">
            <input type="button" value="戻る" onClick="history.back()">
        </div>
    </div>
@endsection
