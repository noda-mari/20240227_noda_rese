@extends('layouts.header-layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/review-index.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="content__title">
            <p>口コミ一覧</p>
        </div>
        <div class="review__table">
            <table>
                <tr class="table__header">
                    <th>評価</th>
                    <th>コメント</th>
                    <th>画像</th>
                </tr>
                @foreach ($reviews as $review)
                    <tr class="table__description">
                        <td>
                            <div class="review__stars">
                                @if ($review->review_star == 1)
                                    {{ '★' }}
                                @elseif($review->review_star == 2)
                                    {{ '★★' }}
                                @elseif($review->review_star == 3)
                                    {{ '★★★' }}
                                @elseif($review->review_star == 4)
                                    {{ '★★★★' }}
                                @elseif($review->review_star == 5)
                                    {{ '★★★★★' }}
                                @endif
                            </div>
                        </td>
                        <td>
                            {{ $review->review_comment }}
                        </td>
                        <td class="review__img-td">
                            @isset($review->review_img)
                                <div class="review__img">
                                    <img src="{{ asset('storage/images/' . $review->review_img) }}" alt="レビューの画像">
                                </div>
                            @else
                                <div class="review_img-null">
                                    {{ '画像なし' }}
                                </div>
                            @endisset
                        </td>
                        @if (Auth::guard('admin')->check())
                            <td>
                                <div class="review__delete-link">
                                    <a href="/admin/review2/delete/{{ $review->id }}">削除</a>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
