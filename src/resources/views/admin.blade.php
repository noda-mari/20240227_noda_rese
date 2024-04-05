@extends('layouts.admin-header')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="content__left">
            <div class="content__title">
                <p>店舗代表者作成</p>
            </div>
            <div class="manager-create__box">
                <form action="/manager/register" method="POST">
                    @csrf
                    <div class="form__box">
                        <div class="form__error">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="input__item">
                            <div class="input__title">Name</div>
                            <div class="form__input">
                                <span>:&nbsp;</span><input type="text" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form__error">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="input__item">
                            <div class="input__title">Email</div>
                            <div class="form__input">
                                <span>:&nbsp;</span><input type="text" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form__error">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="input__item">
                            <div class="input__title">Password</div>
                            <div class="form__input">
                                <span>:&nbsp;</span><input type="password" name="password" value="{{ old('password') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form__button">
                        <button type="submit">作成</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="content__right">
            <div class="content__title">
                <p>エリア・ジャンル作成</p>
            </div>
            <div class="area-create__box">
                @if (session('success') && session('area_name'))
                    <div class="success-message">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error') && session('area_name'))
                    <div class="error-message">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('error') && session('area'))
                    <div class="error-message">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="area-input__box">
                    <form action="/admin/area/add" method="post">
                        @csrf
                        <input type="text" name="name" placeholder="追加したいエリアを入力してください">
                        <div class="area__input-button">
                            <button type="submit">作成</button>
                        </div>
                    </form>
                </div>
                @if (session('success') && session('genre_name'))
                    <div class="success-message">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error') && session('genre_name'))
                    <div class="error-message">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('error') && session('genre'))
                    <div class="error-message">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="genre-input__box">
                    <form action="/admin/genre/add" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="追加したいジャンル名を入力してください">
                        <div class="genre__input-button">
                            <button type="submit">作成</button>
                        </div>
                    </form>
                </div>
                <div class="list__description">
                    <p>★下記のボタンをクリックすると現在の一覧が表示されます★</p>
                </div>
                <div class="area__list">
                    <label for="area">▼エリア一覧</label>
                    <input type="checkbox" id="area" class="switch" />
                    <div class="area__name">
                        @foreach ($areas as $area)
                            <div>{{ $area['name'] }}</div>
                        @endforeach
                    </div>
                </div>
                <div class="genre__list">
                    <label for="genre">▼ジャンル一覧</label>
                    <input type="checkbox" id="genre" class="switch" />
                    <div class="genre__name">
                        @foreach ($genres as $genre)
                            <div>{{ $genre['name'] }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content__bottom">
        <div class="content__title">
            <p>メール送信・編集</p>
            @if (session('success') && session('mail'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @elseif(session('error') && session('mail'))
                <div class="error-message">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="mail-send__box">
            <form action="/admin/mail" method="POST">
                @csrf
                <div class="subject__input">
                    <input type="text" name="subject" placeholder="件名を入力してください">
                    <div class="form__error">
                        @error('subject')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="textarea">
                    <div class="form__error">
                        @error('content')
                            {{ $message }}
                        @enderror
                    </div>
                    <textarea name="content" cols="30" rows="10"></textarea>
                </div>
                <div class="mail-submit__button">
                    <button type="submit">送信</button>
                </div>
            </form>
        </div>
    </div>
@endsection
