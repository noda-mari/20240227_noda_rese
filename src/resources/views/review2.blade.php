@extends('layouts.header-layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/review2.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/94c49572d8.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="content">
        <div class="content-left">
            <div class="content__description">
                <p>今回のご利用はい<br>かがでしたか？</p>
            </div>
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
                                    <i class="fa-solid fa-heart favorite__toggle before" data-shop-id="{{ $shop->id }}"></i>
                                </div>
                            @else
                                <div class="favorite__icon">
                                    <i class="fa-solid fa-heart favorite__toggle liked" data-shop-id="{{ $shop->id }}"></i>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        <div class="content-right">
            @isset($review)
                <form action="/review2/update/{{ $review->id }}" method="post" enctype='multipart/form-data' id="uploadForm">
                    @csrf
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    <div class="review__box">
                        <div class="review__box-title">
                            <div class="review__title">体験を評価してください</div>
                            <div class="error">
                                @error('review_star')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="review__stars">
                            <input id="star5" type="radio" name="review_star" value="5"
                                {{ $review->review_star == '5' ? 'checked' : '' }}><label for="star5">★</label>
                            <input id="star4" type="radio" name="review_star" value="4"
                                {{ $review->review_star == '4' ? 'checked' : '' }}><label for="star4">★</label>
                            <input id="star3" type="radio" name="review_star" value="3"
                                {{ $review->review_star == '3' ? 'checked' : '' }}><label for="star3">★</label>
                            <input id="star2" type="radio" name="review_star" value="2"
                                {{ $review->review_star == '2' ? 'checked' : '' }}><label for="star2">★</label>
                            <input id="star1" type="radio" name="review_star" value="1"
                                {{ $review->review_star == '1' ? 'checked' : '' }}><label for="star1">★</label>
                        </div>
                        <div class="review__box-title">
                            <div class="review__title">口コミを投稿</div>
                            <div class="error">
                                @error('review_comment')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="review__textarea">
                            <textarea name="review_comment" cols="30" rows="10" placeholder="接客や料理の感想などを記入してください">{{ $review->review_comment }}</textarea>
                        </div>
                        <div class="review__box-title">
                            <div class="review__title">画像を追加</div>
                            <div class="error">
                                @error('review_comment')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="container">
                            <div class="drop-zone" id="js-dropzone">
                                <div class="overlay-area" id="js-overlay-area">
                                    <p class="no-active" id="js-overlay-text">ここにドラッグ&ドロップしてください。</p>
                                </div>
                                <label for="file_upload" class="select-file" id="js-select-file">
                                    ファイルを選択するか<br>ドラッグ&ドロップしてください。
                                    <input class="review-img__input" type="file" id="file_upload" name="review_img"
                                        value="{{ $review->review_img }}">
                                </label>
                                <div class="selected-file no-active" id="js-selected-file">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form__button">
                        <button type="submit">口コミを編集</button>
                    </div>
                </form>
            @else
                <form action="/review2/{{ $shop->id }}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    <div class="review__box">
                        <div class="review__box-title">
                            <div class="review__title">体験を評価してください</div>
                            <div class="error">
                                @error('review_star')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="review__stars">
                            <input id="star5" type="radio" name="review_star" value="5"
                                {{ old('review_star') == '5' ? 'checked' : '' }}><label for="star5">★</label>
                            <input id="star4" type="radio" name="review_star" value="4"
                                {{ old('review_star') == '4' ? 'checked' : '' }}><label for="star4">★</label>
                            <input id="star3" type="radio" name="review_star" value="3"
                                {{ old('review_star') == '3' ? 'checked' : '' }}><label for="star3">★</label>
                            <input id="star2" type="radio" name="review_star" value="2"
                                {{ old('review_star') == '2' ? 'checked' : '' }}><label for="star2">★</label>
                            <input id="star1" type="radio" name="review_star" value="1"
                                {{ old('review_star') == '1' ? 'checked' : '' }}><label for="star1">★</label>
                        </div>
                        <div class="review__box-title">
                            <div class="review__title">口コミを投稿</div>
                            <div class="error">
                                @error('review_comment')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="review__textarea">
                            <textarea id="review__comment" name="review_comment" cols="30" rows="10"
                                placeholder="接客や料理の感想などを記入してください">{{ old('review_comment') }}</textarea>
                            <div class="text__counter--box">
                                <p class="text__counter" id="text-length">0/400</p>
                            </div>
                        </div>
                        <div class="review__box-title">
                            <div class="review__title">画像を追加</div>
                            <div class="error">
                                @error('review_img')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="container">
                            <input type="file" id="fileInput" name="review_img" style="display: none;">
                            <div class="drop__area" id="dropArea">
                                ファイルをドラッグ＆ドロップまたは、<br><a href="#" class="file__link" id="browseLink">クリックしてファイルを選択</a>
                                <div class="selected__file" id="selected__file"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form__button">
                        <button type="submit">口コミを投稿</button>
                    </div>
                </form>
            @endisset
        </div>
    </div>
    <script>
        $(function() {
            let favorite = $(".favorite__toggle");
            let favoriteShopId;
            favorite.on("click", function() {
                let $this = $(this);
                favoriteShopId = $this.data("shop-id");

                $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        url: "/favorite",
                        method: "POST",
                        data: {
                            shop_id: favoriteShopId,
                        },
                    })
                    .done(function() {
                        $this.toggleClass("liked");
                    })
                    .fail(function() {
                        console.log("fail");
                    });
            });
        });
    </script>
    <script src="{{ asset('js/file.js') }}"></script>
@endsection
