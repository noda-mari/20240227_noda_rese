<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ShopDataRequest;
use App\Http\Requests\ShopMenuRequest;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use App\Models\StoreManager;
use App\Models\Reserve;
use App\Models\ShopMenu;

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
            $shop_menus = ShopMenu::where('shop_id', $shop_id)->get();
            if ($shop_menus->isEmpty()) {
                $shop_menus = null;
                return view('shopdata-add', compact('areas', 'genres', 'shop', 'reserves', 'shop_menus'));
            } else {
                return view('shopdata-add', compact('areas', 'genres', 'shop', 'reserves', 'shop_menus'));
            }
        } else {
            $reserves = null;
            $shop_menus = null;
        }


        return view('shopdata-add', compact('areas', 'genres', 'shop', 'reserves', 'shop_menus'));
    }

    public function shopDataAdd(ShopDataRequest $request)
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

    public function shopDataUpdate(Request $request)
    {

        if ($request->img_data) {
            $file_name = $request->img_data->getClientOriginalName();

            $request->img_data->storeAs('public/images', $file_name);

            $request['shop_img'] = $file_name;
        }


        $manager_id = Auth::guard('store_manager')->id();
        $manager = StoreManager::find($manager_id);

        $shop_data = $request->all();
        unset($shop_data['_token']);
        Shop::find($manager->shop_id)->update($shop_data);

        return redirect('manager/shop-data');
    }

    public function shopMenuAdd(ShopMenuRequest $request)
    {
        $manager = Auth::guard('store_manager')->user();

        $shop_id = $manager->shop_id;

        if ($shop_id === null) {
            session()->flash('shop_name_error', '店舗情報を作成してください');
            return redirect('manager/shop-data');
        } else {

            ShopMenu::create([
                'shop_id' => $shop_id,
                'menu_name' => $request->menu_name,
                'price' => $request->price,
            ]);
            session()->flash('shop_name_success', 'メニューを作成しました');
            return redirect('manager/shop-data');
        }
    }
}
