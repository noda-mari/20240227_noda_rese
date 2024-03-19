<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class AdminLoginController extends Controller
{
    public function index()
    {

        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('admin\admin-page');
        }
        return back()->withErrors([
            'email' => '入力されたメールアドレス、またはパスワードは登録されていません',
        ]);
    }
}
