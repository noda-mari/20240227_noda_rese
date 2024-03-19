<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use DateTime;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::create([
            'name' => 'テスト管理者',
            'email' => 'test@example.com',
            'email_verified_at' => new DateTime(),
            'password' => '$2y$10$KNO0MbewrzFLF35V.NpFyO0.ud/37yrFX3OKriSSV4eZqRFnSIeHe',
        ]);


        $admin->assignRole('admin');
    }
}
