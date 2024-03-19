<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showMenu()
    {
        if (Auth::guard('admin')->check()) {

            return view('admin.member-menu');
        } else {

            return view('admin.menu');
        }
    }


    public function index()
    {
        $admin = Auth::guard('admin')->user();

        $areas = Area::select('name')->get();

        $genres = Genre::select('name')->get();

        return view('admin', compact('areas', 'genres', 'admin'));
    }

    public function areaAdd(Request $request)
    {

        $area_name = $request->name;

        $area = Area::firstOrCreate(['name' => $area_name]);

        if ($area->wasRecentlyCreated) {

            $request->session()->flash('success', $area_name . 'を追加しました');
            return redirect('admin\admin-page')->with(compact('area_name'));
        } else {
            $request->session()->flash('error', $area_name . 'は既に登録されています');
            return redirect('admin\admin-page')->with(compact('area_name'));
        }
    }

    public function genreAdd(Request $request)
    {

        $genre_name = $request->name;

        $genre = Genre::firstOrCreate(['name' => $genre_name]);

        if ($genre->wasRecentlyCreated) {
            $request->session()->flash('success', $genre_name . 'を追加しました');
            return redirect('admin\admin-page')->with(compact('genre_name'));
        } else {
            $request->session()->flash('error', $genre_name . 'は既に登録されています');
            return redirect('admin\admin-page')->with(compact('genre_name'));
        }
    }
}
