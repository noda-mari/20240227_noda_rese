<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;


class QrcodeController extends Controller
{
    public function index(Request $request, $id)
    {

        $reserve = Reserve::with('user', 'shop')->where('id', $id)->first();

        return view('reserve', compact('reserve'));
    }

    public function qrView(Request $request)
    {
        $id = $request->id;

        return view('qrcode', compact('id'));
    }
}
