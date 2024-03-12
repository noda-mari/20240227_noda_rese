<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

use DateTime;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $register_permission = Permission::create(['name' => 'register']);
        $shop_index = Permission::create(['name' => 'shop_index']);
        $general = Permission::create(['name' => 'general']);

        $admin = Role::create(['name' => 'admin']);
        $store_manager = Role::create(['name' => 'store_manager']);
        $user = Role::create(['name' => 'user']);

        $admin -> givePermissionTo($register_permission);
        $store_manager -> givePermissionTo($shop_index);
        $user -> givePermissionTo($general);

        $user1 = new User();
        $user1->name = 'テスト管理者';
        $user1->email = 'test@example.com';
        $user1->email_verified_at = new DateTime();
        $user1->password = '$2y$10$KNO0MbewrzFLF35V.NpFyO0.ud/37yrFX3OKriSSV4eZqRFnSIeHe';
        // パスワードはtest0000
        $user1->save();

        $user2 = new User();
        $user2->name = 'テスト店舗代表者';
        $user2->email = 'shop@example.com';
        $user2->email_verified_at = new DateTime();
        $user2->password = '$2y$10$c8yP1MG49F.gA.qXzTj4Ce3y6OiIiW/aiLa1Qhj7/.rAke3vfxNDa';
        // パスワードはshop0000
        $user2->save();

        $user1->assignRole('admin');
        $user2->assignRole('store_manager');
    }
}
