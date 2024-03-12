<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;

class StoreManagerController extends Controller
{
    public function index()
    {

        $areas = Area::all();
        $genres = Genre::all();

        return view('shopdata-add', compact('areas', 'genres'));
    }

    public function shopDataAdd(Request $request)
    {
        $area_id = $request->area_id;

        $genre_id = $request->genre_id;

        $file_name = $request->shop_img->getClientOriginalName();

        $image_path = $request->shop_img->storeAs('public/images', $file_name);

        Shop::create([
            'area_id' => $area_id,
            'genre_id' => $genre_id,
            'name' => $request->name,
            'description' => $request->description,
            'shop_img' => $file_name,
        ]);

        return redirect('/shop-data');
    }
}
