<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerLogoutController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('store_manager')->logout();

        $request->session()->regenerateToken();

        return redirect('/manager/login');
    }
}
