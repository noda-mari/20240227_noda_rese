<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shop;
use App\Models\Genre;
use App\Models\Area;



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

        return view('detail', compact('shop_detail'));
    }

    public function search(Request $request)
    {
        $shops = Shop::with('area', 'genre')->AreaSearch($request->area_id)->GenreSearch($request->genre_id)->KeywordSearch($request->keyword)->get();

        $genres = Genre::all();

        $areas = Area::all();

        return view('index', compact('shops', 'genres', 'areas'));
    }
}
