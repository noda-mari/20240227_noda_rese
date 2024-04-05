<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reserve;
use DateTime;

class ReservesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = new DateTime();

        Reserve::create([
            'user_id' => '1',
            'shop_id' => '1',
            'date' => $date->format('Y-m-d'),
            'time' => '19:00',
            'number' => '3',
        ]);


        Reserve::create([
            'user_id' => '1',
            'shop_id' => '1',
            'date' => $date->modify('-1 day')->format('Y-m-d'),
            'time' => '19:00',
            'number' => '3',
        ]);
    }
}
