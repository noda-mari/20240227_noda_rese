@extends('layouts.admin-header')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/success.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="confirm__box">
            <div class="content__header">
                <p>success</p>
                <a href="{{ route('admin.page') }}" class="close__button">✖</a>
            </div>
            <div class="content__inner">
                <p>{{ $store_manager->name }}</p>
                <p>店舗管理者として登録しました</p>
            </div>
        </div>
    </div>
@endsection
