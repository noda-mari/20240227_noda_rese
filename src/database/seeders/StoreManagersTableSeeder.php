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
        $manager1 = StoreManager::create([
            'shop_id' => '1',
            'name' => 'テスト店舗管理者',
            'email' => 'shop@example.com',
            'email_verified_at' => new DateTime(),
            'password' => '$2y$10$PuPP.JjSeBANyRlFDNQ7fu1GEKlMyogYZY5sqQWrw2glFLisT3wX6',
        ]);


        $manager1->assignRole('store_manager');

        $manager2 = StoreManager::create([
            'shop_id' => null,
            'name' => 'テスト店舗管理者２',
            'email' => 'shop2@example.com',
            'email_verified_at' => new Datetime(),
            'password' => '$2y$10$G5YKB0paSw5gKJ9gYB/KJuWYKP.6/CKqzO5o0QsXdldXkSV.SFL.u'
        ]);

        $manager2->assignRole('store_manager');
    }
}
