<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/94c49572d8.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <form action="/menu" method="get">
                <button class="title__logo" type="submit"><img src="{{ asset('storage/images/menu1.png') }}"
                        alt=""></button>
            </form>
            <h1>Rese</h1>
        </div>
        <div class="header__nav">
            <nav>
                <ul>
                    <form action="/shop/search" method="get">
                        @csrf
                        <li>
                            <select name="area_id">
                                <option value="">All area&nbsp;&nbsp;&nbsp;</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area['id'] }}">{{ $area['name'] }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <select name="genre_id">
                                <option value="">All genre</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                                @endforeach
                            </select>
                        </li>
                        <li>
                            <button>
                                <img src="{{ asset('storage/images/saerch2.png') }}" alt="">
                            </button>
                            <input class="search__input" type="text" name="keyword" value="{{ old('keyword') }}"
                                placeholder="search…">
                        </li>
                    </form>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="shops-card__wrapper">
            @foreach ($shops as $shop)
                <div class="shops-card">
                    <div class="shop__img">
                        <img src="{{ asset('storage/images/' . $shop->shop_img) }}" alt="">
                    </div>
                    <div class="card__content">
                        <p class="card__title">{{ $shop->name }}</p>
                        <div class="shop__tag">
                            <small>{{ '#' . $shop->area->name }}</small>
                            <small>{{ '#' . $shop->genre->name }}</small>
                        </div>
                        <div class="form">
                            <form action="/detail/{{ $shop->id }}" method="GET">
                                @csrf
                                <button class="detail-button" type="submit">詳しく見る</button>
                            </form>
                            @auth
                                @if (!$shop->isFavoriteBy(Auth::user()))
                                    <div class="favorite__icon">
                                        <i class="fa-solid fa-heart favorite__toggle before"
                                            data-shop-id="{{ $shop->id }}"></i>
                                    </div>
                                @else
                                    <div class="favorite__icon">
                                        <i class="fa-solid fa-heart favorite__toggle liked"
                                            data-shop-id="{{ $shop->id }}"></i>
                                    </div>
                                @endif
                            @endauth
                            @guest
                                <div class="favorite__icon">
                                    <i class="fa-solid fa-heart modal__open before"></i>
                                </div>
                                <div id="guest__modal" class="modal">
                                    <div class="modal__content">
                                        <div class="close">&times;</div>
                                        <div class="modal__main">
                                            <p>お気に入り機能を利用するには、会員登録が必要です</p>
                                            <p>新規会員登録はこちらから</p>
                                            <form action="/register" method="GET">
                                                <button class="register-button">会員登録</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/favorite.js') }}"></script>
</body>

</html>
