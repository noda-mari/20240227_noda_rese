<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <header>
        <div class="header__inner">
            <button class="login__title-img"><img src="{{ asset('icons/menu1.png') }}"></button>
            <h1 class="title">Rese</h1>
        </div>
    </header>

    <main>
        <div class="content_wrapper">
            <div class="content">
                <p class="content__title">StoreManager&nbsp;Login</p>
                <div class="form">
                    <form action="/manager/login" method="post">
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
            </div>
        </div>
    </main>
</body>

</html>
