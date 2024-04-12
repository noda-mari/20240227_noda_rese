<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shop;
use App\Models\Genre;
use App\Models\Area;
use App\Models\ShopMenu;



class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::with('area', 'genre')->get();

        $genres = Genre::all();

        $areas = Area::all();

        return view('index', compact('shops', 'genres', 'areas'));
    }

    public function shopDetail($id)
    {
        $shop_detail = Shop::with('area', 'genre')->find($id);

        $shop_menus = ShopMenu::where('shop_id', $id)->get();

        if ($shop_menus->isEmpty()) {
            $shop_menus = null;
            return view('detail', compact('shop_detail', 'shop_menus'));
        } else {

            return view('detail', compact('shop_detail', 'shop_menus'));
        }
    }

    public function search(Request $request)
    {
        $shops = Shop::with('area', 'genre')->AreaSearch($request->area_id)->GenreSearch($request->genre_id)->KeywordSearch($request->keyword)->get();

        $genres = Genre::all();

        $areas = Area::all();

        return view('index', compact('shops', 'genres', 'areas'));
    }
}
