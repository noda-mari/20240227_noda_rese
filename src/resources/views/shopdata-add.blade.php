<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header-layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shopdata-add.css') }}">
</head>

<body>
    <header>
        <div class="header__inner">
            <form action="/manager/menu" method="get">
                <button class="title__logo" type="submit"><img src="{{ asset('icons/menu1.png') }}"></button>
            </form>
            <h1 class="title">Rese</h1>
        </div>
    </header>

    <main>
        <div class="content__title">
            <p>店舗情報作成 . 更新</p>
            @if ($shop === null)
                <p class="content__title-sml">管理している店舗：作成してください</p>
            @else
                <p class="content__title-sml">管理している店舗：{{ $shop->name }}</p>
            @endif
        </div>
        @if ($shop === null)
            <div class="shop-data__input-box">
                <form action="shop-data/add" method="post" enctype='multipart/form-data'>
                    <div class="flex__box">
                        @csrf
                        <div class="input__item1">
                            <div class="name__input">
                                <div class="input__title">店舗名：
                                    <div class="form__error">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <input type="text" name="name" id="name" value="{{ old('name') }}">
                            </div>
                            <div class="area__input">
                                <div class="input__title">所在地：
                                    <div class="form__error">
                                        @error('area_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="area__salact-box">
                                    <select name="area_id" id="area">
                                        @foreach ($areas as $area)
                                            <option value="{{ $area['id'] }}">
                                                {{ $area['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="genre__input">
                                <div class="input__title">ジャンル：
                                    <div class="form__error">
                                        @error('genre_id')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <div class="genre__select-box">
                                    <select name="genre_id" id="genre">
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre['id'] }}">
                                                {{ $genre['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="input__item2">
                            <div class="description__input">
                                <div class="input__title" for="description">店舗のPR：
                                    <div class="form__error">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <textarea name="description" id="description" cols="30" rows="6" value="">{{ old('description') }}</textarea>
                            </div>
                            <div class="img__input">
                                <div class="input__title" for="shop_img">店舗画像：
                                    <div class="form__error">
                                        @error('shop_img')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>
                                <input type="file" name="shop_img" id="shop_img" value="{{ old('shop_img') }}">
                            </div>
                        </div>
                    </div>
                    <div class="form__button">
                        <button type="submit">作成</button>
                    </div>
                </form>
            </div>
        @else
            <div class="shop-data__input-box">
                <form action="shop-data/update" method="post" enctype='multipart/form-data'>
                    <div class="flex__box">
                        @csrf
                        <div class="input__item1">
                            <div class="name__input">
                                <div class="input__title">店舗名：</div>
                                <input type="text" name="name" id="name" value="{{ $shop->name }}">
                            </div>
                            <div class="area__input">
                                <div class="input__title">所在地：</div>
                                <div class="area__salact-box">
                                    <select name="area_id" id="area">
                                        @foreach ($areas as $area)
                                            <option value="{{ $area['id'] }}"
                                                {{ isset($shop) && $shop->area_id == $area['id'] ? 'selected' : '' }}>
                                                {{ $area['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="genre__input">
                                <div class="input__title">ジャンル：</div>
                                <div class="genre__select-box">
                                    <select name="genre_id" id="genre">
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre['id'] }}"
                                                {{ isset($shop) && $shop->genre_id == $genre['id'] ? 'selected' : '' }}>
                                                {{ $genre['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="input__item2">
                            <div class="description__input">
                                <label for="description">店舗のPR：
                                    <textarea name="description" id="description" cols="30" rows="6" value="">{{ $shop->description }}</textarea>
                                </label>
                            </div>
                            <div class="img__input">
                                <label for="shop_img">店舗画像：
                                    <input type="file" name="img_data" id="shop_img">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form__button">
                        <button type="submit">更新</button>
                    </div>
                </form>
            </div>
        @endif
        <div class="content__title2">
            <p>メニューの設定</p>
            @if (session('shop_name_success'))
                <div class="success-message">
                    {{ session('shop_name_success') }}
                </div>
            @endif
            @if (session('shop_name_error'))
                <div class="error-message">
                    {{ session('shop_name_error') }}
                </div>
            @endif
        </div>
        <div class="shop_menu__create-box">
            <form class="shop_menu__form" action="/manager/shop_menu/add" method="POST">
                @csrf
                <div class="shop_menu__input-box">
                    <div class="name__input">
                        <div class="input__title">名前：
                            <div class="form__error">
                                @error('menu_name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <input type="text" name="menu_name">
                    </div>
                    <div class="price__input">
                        <div class="input__title">値段：
                            <div class="form__error">
                                @error('price')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <input type="text" name="price">
                    </div>
                </div>
                <div class="shop_menu__form-button">
                    <button type="submit">作成</button>
                </div>
            </form>
            <div class="shop_menu__list">
                @if ($shop_menus === null)
                    <label for="menu">▼メニュー一覧</label>
                    <input type="checkbox" id="menu" class="switch" />
                    <div class="shop_menu">
                        <div>{{ 'メニューが作成されていません' }}</div>
                    </div>
                @else
                    <label for="menu">▼メニュー一覧</label>
                    <input type="checkbox" id="menu" class="switch" />
                    <div class="shop_menu">
                        @foreach ($shop_menus as $shop_menu)
                            <div>{{ $shop_menu['menu_name'] . ':' . $shop_menu['price'] . '円' }}</div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="content__title">
            <p>予約情報</p>
        </div>
        <div class="reserve__list-wrapper">
            <div class="reserve__table">
                @if ($reserves == null || $reserves->isEmpty())
                    予約情報はありません。
                @else
                    <table>
                        <tr>
                            <th>氏名</th>
                            <th>日付</th>
                            <th>時間</th>
                            <th>人数</th>
                            <th>レビュー</th>
                        </tr>
                        @foreach ($reserves as $reserve)
                            <tr>
                                <td>{{ $reserve->user->name }}</td>
                                <td>{{ $reserve->date }}</td>
                                <td>{{ $reserve->time }}</td>
                                <td>{{ $reserve->number . '人' }}</td>
                                <td>
                                    @if (!$reserve->review)
                                        {{ 'レビューはされていません' }}
                                    @else
                                        <button class="review__model-btn"
                                            data-star="{{ $reserve->review->review_star }}"
                                            data-comment="{{ $reserve->review->review_comment }}">レビュー</button>
                                        {{-- ここからレビューモーダル --}}
                                        <div id="review__modal">
                                            <div class="modal__content">
                                                <div class="content__header">
                                                    <span class="modal__close-button">×</span>
                                                </div>
                                                <div class="review__ster">
                                                    <p>評価</p>
                                                    <div class="star"></div>
                                                </div>
                                                <div class="review__comment">
                                                    <p>コメント</p>
                                                    <div class="comment"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
        <script src="{{ asset('js/review.js') }}"></script>
    </main>
</body>
