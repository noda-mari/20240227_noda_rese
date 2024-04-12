<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopMenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'shop_id' => '1',
            'menu_name' => '寿司コース１',
            'price' => 3000
        ];

        DB::table('shop_menus')->insert($param);
        $param = [
            'shop_id' => '1',
            'menu_name' => '寿司コース２',
            'price' => 5000
        ];

        DB::table('shop_menus')->insert($param);

        $param = [
            'shop_id' => '1',
            'menu_name' => '寿司コース３',
            'price' => 10000
        ];

        DB::table('shop_menus')->insert($param);

        $param = [
            'shop_id' => '2',
            'menu_name' => '食べ放題１',
            'price' => 3000
        ];

        DB::table('shop_menus')->insert($param);

        $param = [
            'shop_id' => '2',
            'menu_name' => '食べ放題２',
            'price' => 5000
        ];

        DB::table('shop_menus')->insert($param);

        $param = [
            'shop_id' => '2',
            'menu_name' => '食べ放題３',
            'price' => 10000
        ];

        DB::table('shop_menus')->insert($param);

        $param = [
            'shop_id' => '3',
            'menu_name' => '飲み放題１',
            'price' => 1000
        ];

        DB::table('shop_menus')->insert($param);

        $param = [
            'shop_id' => '3',
            'menu_name' => '女子会飲み放題',
            'price' => 3000
        ];

        DB::table('shop_menus')->insert($param);

        $param = [
            'shop_id' => '3',
            'menu_name' => '飲み食べ放題',
            'price' => 5000
        ];

        DB::table('shop_menus')->insert($param);
    }
}
