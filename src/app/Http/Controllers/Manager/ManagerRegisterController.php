<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Models\StoreManager;
use App\Http\Requests\ManagerRegisterRequest;

class ManagerRegisterController extends Controller
{
    public function store(ManagerRegisterRequest $request)
    {
        $store_manager = StoreManager::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $store_manager->assignRole('store_manager');

        event(new Registered($store_manager));


        return view('success', compact('store_manager'));
    }
}
