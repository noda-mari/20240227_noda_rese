<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReserveRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\favorite;
use App\Models\Reserve;

use DateTime;



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

        $reserves = Reserve::with('user', 'shop')->where('user_id', $user_id)->get();

        $favorites = Favorite::with('user', 'shop')->where('user_id', $user_id)->get();

        return view('my-page', compact('reserves', 'favorites', 'user'));
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

    public function reserveUpdate(ReserveRequest $request,$shop_id)
    {
        $user_id = Auth::id();

        $update_date = [
            'user_id' => $user_id,
            'shop_id' => $shop_id,
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number,
        ];

        Reserve::where('user_id',$user_id)->where('shop_id',$shop_id)->update($update_date);

        $request->session()->flash('success', '予約を変更しました');

        return redirect('/mypage');

    }

    public function reserveDelete($id)
    {
        $user_id = Auth::id();
        $shop_id = $id;

        Reserve::where('shop_id', $shop_id)->where('user_id', $user_id)->delete();

        return redirect('/mypage');
    }
}
