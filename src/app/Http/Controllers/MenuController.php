<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function menuView()
    {
        if (Auth::check()) {

            return view('member-menu');
        }

        return view('menu');
    }
}
