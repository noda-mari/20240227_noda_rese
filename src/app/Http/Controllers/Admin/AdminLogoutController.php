<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLogoutController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
