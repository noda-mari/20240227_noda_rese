@extends('layouts.header-layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shopdata-add.css') }}">
@endsection

@section('content')
    <div class="content__title">
        <p>店舗情報作成 . 更新</p>
    </div>
    <div class="shop-data__input-box">
        <form action="/shop-data/add" method="post" enctype='multipart/form-data'>
            <div class="flex__box">
                @csrf
                <ul class="input__item1">
                    <li>
                        <div class="input__title">店舗名：</div>
                        <input type="text" name="name" id="name">
                    </li>
                    <li>
                        <div class="input__title">所在地：</div>
                        <select name="area_id" id="area">
                            @foreach ($areas as $area)
                                <option value="{{ $area['id'] }}">{{ $area['name'] }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li>
                        <div class="input__title">ジャンル：</div>
                        <select name="genre_id" id="genre">
                            @foreach ($genres as $genre)
                                <option value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                            @endforeach
                        </select>
                    </li>
                </ul>
                <ul class="input__item2">
                    <li>
                        <label for="description">店舗のPR：
                            <textarea name="description" id="description" cols="30" rows="6"></textarea>
                        </label>
                    </li>
                    <li>
                        <label for="shop_img">店舗画像：
                            <input type="file" name="shop_img" id="shop_img">
                        </label>
                    </li>
                </ul>
            </div>
            <div class="form__button">
                <button type="submit">作成</button>
            </div>
        </form>
    </div>
    <div class="content__title">
        <p>予約情報</p>
    </div>
    <div class="reserve__list-wrapper">
        <div class="reserve__table">
            <table>
                <tr>
                    <th>氏名</th>
                    <th>日付</th>
                    <th>時間</th>
                    <th>人数</th>
                    <th>レビュー</th>
                </tr>
                <tr>
                    <td>名前</td>
                    <td>3月23日</td>
                    <td>16:00:00</td>
                    <td>2人</td>
                    <td>
                        <button>レビュー</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
