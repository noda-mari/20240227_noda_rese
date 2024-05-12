<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shop;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Review;
use App\Models\ShopMenu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $user_id =  Auth::id();

        $shop_detail = Shop::with('area', 'genre')->find($id);

        $shop_menus = ShopMenu::where('shop_id', $id)->get();

        $review = Review::with('user', 'shop')->where('shop_id', $id)->where('user_id', $user_id)->first();

        if ($shop_menus->isEmpty()) {
            $shop_menus = null;
            return view('detail', compact('shop_detail', 'shop_menus', 'review'));
        } else {

            return view('detail', compact('shop_detail', 'shop_menus', 'review'));
        }
    }

    public function reviewIndex($id)
    {

        $reviews = Review::where('shop_id', $id)->get();

        return view('review-index', compact('reviews'));
    }

    public function sortRandom()
    {

        $shops = Shop::with('area', 'genre')->inRandomOrder()->get();

        $genres = Genre::all();

        $areas = Area::all();

        return view('index', compact('shops', 'genres', 'areas'));
    }

    public function sortDesc()
    {

        $ratedShops = Shop::with('area', 'genre')->select('shops.*', DB::raw('COALESCE(SUM(reviews.review_star), 0) as total_stars'))
            ->Join('reviews', 'shops.id', '=', 'reviews.shop_id')
            ->groupBy('shops.id')
            ->orderBy('total_stars', 'desc')
            ->get();

        $unratedShops = Shop::with('area', 'genre')->doesntHave('reviews')->get();

        $shops = $ratedShops->concat($unratedShops);

        $genres = Genre::all();

        $areas = Area::all();

        return view('index', compact('shops', 'genres', 'areas'));
    }

    public function sortAsc()
    {


        $ratedShops = Shop::with('area', 'genre')->select('shops.*', DB::raw('COALESCE(SUM(reviews.review_star), 0) as total_stars'))
            ->Join('reviews', 'shops.id', '=', 'reviews.shop_id')
            ->groupBy('shops.id')
            ->orderBy('total_stars')
            ->get();

        $unratedShops = Shop::with('area', 'genre')->doesntHave('reviews')->get();

        $shops = $ratedShops->concat($unratedShops);

        $genres = Genre::all();

        $areas = Area::all();

        return view('index', compact('shops', 'genres', 'areas'));
    }

    public function search(Request $request)
    {
        $shops = Shop::with('area', 'genre')->AreaSearch($request->area_id)->GenreSearch($request->genre_id)->KeywordSearch($request->keyword)->get();

        $genres = Genre::all();

        $areas = Area::all();

        return view('index', compact('shops', 'genres', 'areas'));
    }
}
