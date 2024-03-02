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
                                <p>{{ '予約' }}</p>
                            </div>
                            <div class="title__right">
                                <a id="delete__modal-button" data-url="/reserve-delete/{{ $reserve->shop->id }}"><img
                                        src="{{ asset('storage/images/delete1.png') }}" alt=""></a>
                            </div>
                            {{-- ここからモーダル --}}
                            <div id="delete__modal" class="delate__modal">
                                <div class="modal__content">
                                    <div class="close-btn">&times;</div>
                                    <div class="modal__main">
                                        <p>削除してよろしいですか？</p>
                                        <form id="delete__link" action="" method="get">
                                            @csrf
                                            <button class="delete__button">削除</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- ここまでモーダル --}}
                        </div>
                        @if (session('success'))
                            <div class="success-message">
                                {{ session('success') }}
                            </div>
                        @endif
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
                        </table>
                        <div class="reserve__update-button">
                            <button class="modal__open-button" data-reserve-id="{{ $reserve->id }}"
                                data-reserves="{{ $reserves }}"
                                data-url="/reserve/update/{{ $reserve->shop->id }}">予約変更</button>
                        </div>
                    </div>
                    {{-- ここから予約変更モーダル --}}
                    <div id="reserve-modal" class="modal">
                        <div class="modal-container">
                            <div class="modal__content">
                                <div class="modal__header">
                                    <span class="modal__close-button">&times;</span>
                                    <p>予約変更できます</p>
                                </div>
                                <div class="update__table">
                                    <form id="update__form" action="" method="post">
                                        @csrf
                                        <table>
                                            <tr>
                                                <th>店名</th>
                                                <td id="modal-shop-name"></td>
                                            </tr>
                                            <tr>
                                                <th>日付</th>
                                                <td>
                                                    <input type="date" name="date" id="modal-reserve-date"
                                                        value="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>時間</th>
                                                <td>
                                                    <select name="time" id="modal-reserve-time">
                                                        <option value="16:00:00">16:00</option>
                                                        <option value="17:00:00">17:00</option>
                                                        <option value="18:00:00">18:00</option>
                                                        <option value="19:00:00">19:00</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>人数</th>
                                                <td>
                                                    <select name="number" id="modal-reserve-number">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="modal__footer">
                                            <p>以上の内容で予約を変更しますか？</p>
                                            <button class="form-button" type="submit">変更する</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- ここまで --}}
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
        </div>
    </main>
    <script src="{{ asset('js/reserve.js') }}"></script>
</body>

</html>
