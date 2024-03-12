@extends('layouts.header-layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
    <script src="https://kit.fontawesome.com/94c49572d8.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="content">
        <div class="review-box">
            <div class="review__box-header">
                <a class="back__button" href="/mypage">×</a>
                <p class="review__title">お店のレビューをお願いします<i class="fa-regular fa-face-smile"></i></p>
            </div>
            <div class="review__table">
                <form class="review__form" action="/review/{{ $reserve_id }}" method="post">
                    @csrf
                    <div class="review__shop-name">{{ $shop_name }}</div>
                    <input type="hidden" name="shop_id" value="{{ $shop_id }}">
                    <div class="review__box">
                        <div class="review__box-title">
                            <p class="review__p">評価</p>
                            <div class="error">
                                @error('review_star')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="review__stars">
                            <input id="star1" type="radio" name="review_star" value="1" {{ old('review_star') == '1' ? 'checked' : '' }}><label
                                for="star1">★</label>
                            <input id="star2" type="radio" name="review_star" value="2" {{ old('review_star') == '2' ? 'checked' : '' }}><label
                                for="star2">★</label>
                            <input id="star3" type="radio" name="review_star" value="3" {{ old('review_star') == '3' ? 'checked' : '' }}><label
                                for="star3">★</label>
                            <input id="star4" type="radio" name="review_star" value="4" {{ old('review_star') == '4' ? 'checked' : '' }}><label
                                for="star4">★</label>
                            <input id="star5" type="radio" name="review_star" value="5" {{ old('review_star') == '5' ? 'checked' : '' }}><label
                                for="star5">★</label>
                        </div>
                        <div class="review__box-title">
                            <p class="review__p">レビュー内容</p>
                            <div class="error">
                                @error('review_comment')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="review__textarea">
                            <textarea name="review_comment" cols="30" rows="10" placeholder="接客や料理の感想などを記入してください" >{{ old('review_comment') }}</textarea>
                        </div>
                    </div>
                    <div class="review-button">
                        <button type="submit">送信</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
