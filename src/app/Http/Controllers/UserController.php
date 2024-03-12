<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveRequest;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\favorite;
use App\Models\Reserve;
use App\Models\Review;

use DateTime;
use Carbon\Carbon;



class UserController extends Controller
{
    public function favorite(Request $request)
    {
        $user_id = Auth::id();
        $shop_id = $request->shop_id;
        $favorite = Favorite::where('user_id', $user_id)->where('shop_id', $shop_id)->first();

        if (!$favorite) {
            favorite::create([
                'user_id' => $user_id,
                'shop_id' => $shop_id,
            ]);
        } else {
            Favorite::where('shop_id', $shop_id)->where('user_id', $user_id)->delete();
        }

        return redirect('/');
    }

    public function favoriteDelete($id)
    {
        $user_id = Auth::id();
        $shop_id = $id;

        Favorite::where('shop_id', $shop_id)->where('user_id', $user_id)->delete();

        return redirect('/mypage');
    }

    public function mypageView()
    {
        $user_id = Auth::id();

        $user = Auth::user();

        $reserves_date = Reserve::with('user', 'shop')->where('user_id', $user_id)->get();
        $favorites = Favorite::with('user', 'shop')->where('user_id', $user_id)->get();
        $reviews = Review::where('user_id', $user_id)->get();

        $now = new DateTime();

        foreach ($reserves_date as $reserve) {
            if (Carbon::parse($reserve->date)->gt($now)) {
                $reserves[] = $reserve;
            } else {
                $reserved[] = $reserve;

                foreach ($reserved as $item) {
                    foreach ($reviews as $review) {
                        if ($item->id === $review->reserve_id) {
                            $item['reviewed'] = true;
                        }
                    }
                }
            }
        }

        if (!isset($reserves) && !isset($reserved)) {
            return view('my-page', compact('favorites', 'user'));
        } elseif (!isset($reserves)) {
            return view('my-page', compact('reserved', 'favorites', 'user'));
        } elseif (!isset($reserved)) {
            return view('my-page', compact('reserves', 'favorites', 'user'));
        }
        return view('my-page', compact('reserves', 'reserved', 'favorites', 'user', ));
    }

    public function reserveAdd(ReserveRequest $request, $shop_id)
    {

        if (Auth::check()) {

            $user_id = Auth::id();
            $date = $request->date;
            $time = $request->time;

            $date = new DateTime($date);
            $time = new DateTime($time);

            Reserve::create([
                'user_id' => $user_id,
                'shop_id' => $shop_id,
                'date' => $date,
                'time' => $time,
                'number' => $request->number,
            ]);

            return view('reserve-thanks');
        }

        return view('auth.login');
    }

    public function reserveUpdate(ReserveRequest $request, $id)
    {

        $update_date = [
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number,
        ];

        Reserve::find($id)->update($update_date);

        $request->session()->flash('success', '予約を変更しました');

        $reserve_id = $id;

        return redirect('/mypage')->with(compact('reserve_id'));
    }

    public function reserveDelete($id)
    {

        Reserve::find($id)->delete();

        return redirect('/mypage');
    }

    public function reviewIndex(Request $request, $id)
    {

        $reserve = Reserve::find($id);

        $shop_id = $reserve->shop_id;
        $shop_name = $reserve->shop->name;

        $reserve_id = $id;

        return view('review', compact('reserve_id', 'shop_name','shop_id'));
    }

    public function reviewAdd(ReviewRequest $request,$id)
    {

        $user_id = Auth::id();

        $shop_id = $request->shop_id;

        $reserve_id = $id;

        Review::create([
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'reserve_id' => $reserve_id,
            'review_star' => $request->review_star,
            'review_comment' => $request->review_comment,
        ]);


        return view('review-thanks');
    }
}
