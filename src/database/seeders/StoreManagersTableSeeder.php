<?php

namespace Database\Seeders;

use App\Models\StoreManager;
use Datetime;
use Illuminate\Database\Seeder;

class StoreManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manager = StoreManager::create([
            'shop_id' => '1',
            'name' => 'テスト店舗管理者',
            'email' => 'shop@example.com',
            'email_verified_at' => new DateTime(),
            'password' => '$2y$10$PuPP.JjSeBANyRlFDNQ7fu1GEKlMyogYZY5sqQWrw2glFLisT3wX6',
        ]);


        $manager->assignRole('store_manager');
    }
}
