<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
</head>

<body>
    <div class="content__wrapper">
        <div class="content-left">
            <div class="header">
                <form action="/menu" method="get">
                    <button class="title__logo" type="submit"><img src="{{ asset('icons/menu1.png') }}"
                            alt=""></button>
                </form>
                <h1 class="title">Rese</h1>
            </div>
            <div class="shop__detail">
                <div class="shop__name">
                    <input class="back-button" type="button" value="&lt;" onClick="history.back()">
                    <h2>{{ $shop_detail->name }}</h2>
                </div>
                <div class="shop__content">
                    <div class="shop__img">
                        <img src="{{ asset('storage/images/' . $shop_detail->shop_img) }}" alt="">
                    </div>
                    <div class="shop__tag">
                        <p class="shop__tag--item">{{ '#' . $shop_detail->area->name }}</p>
                        <p class="shop__tag--item">{{ '#' . $shop_detail->genre->name }}</p>
                    </div>
                    <div class="shop__descripcion">
                        <p>{{ $shop_detail->description }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-right">
            <div class="reserve__form">
                <p>予約</p>
                <form action="/reserve/{{ $shop_detail->id }}" method="POST">
                    @csrf
                    <div class="input__wrapper">
                        <div class="date__input">
                            <input name="date" type="date" id="date__input" value="{{ old('date') }}"
                                onchange="showDateValue()">
                        </div>
                        <div class="time__select">
                            <select name="time" id="select__input" onchange="showSelectValue()">
                                <option value="" @if (old('time') == '') selected @endif></option>
                                <option value="16:00" @if (old('time') == '16:00') selected @endif>16:00</option>
                                <option value="17:00" @if (old('time') == '17:00') selected @endif>17:00</option>
                                <option value="18:00" @if (old('time') == '18:00') selected @endif>18:00</option>
                                <option value="19:00" @if (old('time') == '19:00') selected @endif>19:00</option>
                                <option value="20:00" @if (old('time') == '20:00') selected @endif>20:00</option>
                                <option value="21:00" @if (old('time') == '21:00') selected @endif>21:00</option>
                                <option value="22:00" @if (old('time') == '22:00') selected @endif>22:00</option>
                            </select>
                        </div>
                        <div class="number__select">
                            <select name="number" id="number__input" onchange="showNumberValue()">
                                <option value="" @if (old('number') == '') selected @endif></option>
                                <option value="1" @if (old('number') == '1') selected @endif>1人</option>
                                <option value="2" @if (old('number') == '2') selected @endif>2人</option>
                                <option value="3" @if (old('number') == '3') selected @endif>3人</option>
                                <option value="4" @if (old('number') == '4') selected @endif>4人</option>
                                <option value="5" @if (old('number') == '5') selected @endif>5人</option>
                            </select>
                        </div>
                        @if (isset($shop_menus))
                            <div class="shop_menu__select">
                                <select name="shop_menu_id" id="menu__input">
                                    <option value="" @if (old('shop_menu_id') == '') selected @endif>
                                        メニューを選択しない</option>
                                    @foreach ($shop_menus as $shop_menu)
                                        <option value="{{ $shop_menu->id }}"
                                            @if (old('shop_menu_id') == $shop_menu->id) selected @endif>
                                            {{ $shop_menu->menu_name }}：{{ $shop_menu->price }}円</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="reserve__confirm--table">
                            <table>
                                <tr>
                                    <th>Shop</th>
                                    <td>{{ $shop_detail->name }}</td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td id="date">
                                        <div class="error">
                                            @error('date')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <td id="time">
                                        <div class="error">
                                            @error('time')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Number</th>
                                    <td id="number">
                                        <div class="error">
                                            @error('number')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <button class="reserve-button">予約</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/reserve-comfirm.js') }}"></script>
</body>

</html>
