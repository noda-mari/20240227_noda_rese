@extends('layouts.layout-menu')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
@endsection

@section('content')
    {!! QrCode::generate(url('reserve/qrcode/' . $id)) !!}
@endsection
