<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class ManagerLoginController extends Controller
{
    public function index()
    {

        return view('manager.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('store_manager')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('manager\shop-data');
        }
        return back()->withErrors([
            'email' => '入力されたメールアドレス、またはパスワードは登録されていません',
        ]);
    }
}
