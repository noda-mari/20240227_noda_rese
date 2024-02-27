<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rose</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
                                    <div class="favorite-button">
                                        <a href="/favorite/{{ $shop->id }}"><i
                                                class="fa-solid fa-heart before"></i></a>
                                    </div>
                                @else
                                    <div class="favorite-button">
                                        <a href="/favorite/{{ $shop->id }}"><i class="fa-solid fa-heart liked"></i></a>
                                    </div>
                                @endif
                            @endauth
                            @guest
                            
                            @endguest
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
</body>

</html>
