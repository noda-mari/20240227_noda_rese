<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 店舗代表者を作成する権限(register)を作成、
        // 管理者という役割(admin)を作成
        // 管理者という役割に、権限(register)を与える
        $admin = Role::create(['guard_name' => 'admin', 'name' => 'admin']);
        $register_permission = Permission::create(['guard_name' => 'admin', 'name' => 'register']);
        $admin->givePermissionTo($register_permission);

        // 店舗情報を作成、更新、店舗の予約を確認できる権限(shop_index)を作成、
        // 店舗代表者という役割(store_manager)を作成
        // 店舗代表者という役割に、権限(shop_index)を与える

        $store_manager = Role::create(['guard_name' => 'store_manager', 'name' => 'store_manager']);
        $shop_index = Permission::create(['guard_name' => 'store_manager', 'name' => 'shop_index']);
        $store_manager->givePermissionTo($shop_index);

        // サイトを使用する権限(general)を作成
        // 利用者という役割を(user)を作成
        // 利用者という役割に、権限を(general)与える

        $general = Permission::create(['name' => 'general']);
        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo($general);
    }
}
