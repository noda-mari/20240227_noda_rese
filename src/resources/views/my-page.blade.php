<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my-page.css') }}">
    <script src="https://kit.fontawesome.com/94c49572d8.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="header__inner">
            <form action="/menu" method="get">
                <button class="title__logo" type="submit"><img src="{{ asset('storage/images/menu1.png') }}"></button>
            </form>
            <h1 class="title">Rese</h1>
        </div>
    </header>

    <main>
        <div class="user__name">
            <h2>{{ $user->name . 'さん' }}</h2>
        </div>
        <div class="content__wrapper">
            <div class="content-left">
                <h3 class="content__title">予約状況</h3>
                @foreach ($reserves as $reserve)
                    <div class="reserve__table">
                        <div class="table__title">
                            <div class="title__left">
                                <div class="table__img">
                                    <img src="{{ asset('storage/images/tokei2.png') }}" alt="">
                                </div>
                                <p>{{ '予約' . $reserve->id }}</p>
                            </div>
                            <div class="title__right">
                                <a href="reserve-delete/{{ $reserve->shop->id }}"><img
                                        src="{{ asset('storage/images/delete1.png') }}" alt=""></a>
                            </div>
                        </div>
                        <form action="reserves/update">
                            <table>
                                <tr>
                                    <th>shop</th>
                                    <td>
                                        {{ $reserve->shop->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>{{ $reserve->date }}</td>
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <td>{{ $reserve->time }}</td>
                                </tr>
                                <tr>
                                    <th>Number</th>
                                    <td>{{ $reserve->number . '人' }}</td>
                                </tr>
                                <tr>
                                    <td>
                                    <button>予約変更</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="content-right">
                <h3 class="content__title">お気に入り店舗</h3>
                <div class="favorite-card__wrapper">
                    @foreach ($favorites as $favorite)
                        <div class="favorite-card">
                            <div class="shop__img">
                                <img src="{{ asset('storage/images/' . $favorite->shop->shop_img) }}" alt="">
                            </div>
                            <div class="card__content">
                                <p class="card__title">{{ $favorite->shop->name }}</p>
                                <div class="shop__tag">
                                    <small>{{ '#' . $favorite->shop->area->name }}</small>
                                    <small>{{ '#' . $favorite->shop->genre->name }}</small>
                                </div>
                                <div class="form">
                                    <form action="/detail/{{ $favorite->shop->id }}" method="GET">
                                        @csrf
                                        <button class="detail-button" type="submit">詳しく見る</button>
                                    </form>
                                    <div class="favorite__icon">
                                        <a href="/favorite-delete/{{ $favorite->shop->id }}"><i
                                                class="fa-solid fa-heart liked"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </main>
</body>

</html>
