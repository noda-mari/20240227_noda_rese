<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Http\Requests\AdminRegisterRequest;

class AdminRegisterController extends Controller
{
    public function create()
    {
        return view('admin.register');
    }

    public function store(AdminRegisterRequest $request)
    {
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $admin->assignRole('admin');

        event(new Registered($admin));

        Auth::guard('admin')->login($admin);

        return Redirect::route('admin.page');
    }
}
