<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\StoreManager;
use App\Models\Reserve;

use Carbon\Carbon;

class StoreManagerController extends Controller
{
    public function showMenu()
    {
        return view('manager.member-menu');
    }

    public function index()
    {
        $manager_id = Auth::guard('store_manager')->id();
        $manager = StoreManager::find($manager_id);
        $shop_id = $manager->shop_id;
        $shop = $manager->shop;

        $areas = Area::all();
        $genres = Genre::all();

        if ($shop_id) {
            $reserves = Reserve::with('user', 'shop', 'review')->where('shop_id', $shop_id)->orderBy('date', 'asc')->orderBy('time', 'asc')->get();
        } else {
            $reserves = null;
        }


        return view('shopdata-add', compact('areas', 'genres', 'shop', 'reserves'));
    }

    public function shopDataAdd(Request $request)
    {
        $area_id = $request->area_id;

        $genre_id = $request->genre_id;

        $file_name = $request->shop_img->getClientOriginalName();

        $request->shop_img->storeAs('public/images', $file_name);

        $shop = Shop::create([
            'area_id' => $area_id,
            'genre_id' => $genre_id,
            'name' => $request->name,
            'description' => $request->description,
            'shop_img' => $file_name,
        ]);

        $shop_id = $shop->id;

        $manager_id = Auth::guard('store_manager')->id();

        $now = Carbon::now();

        $manager = StoreManager::find($manager_id);
        $manager->shop_id = $shop_id;
        $manager->updated_at = $now;
        $manager->save();

        return redirect('manager/shop-data');
    }
}
