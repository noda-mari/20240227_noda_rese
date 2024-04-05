<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use DateTime;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => '山田花子',
            'email' => 'hanako@test.com',
            'email_verified_at' => new DateTime(),
            'password' => '$2y$10$piDnXRnCxJZcEXhHE.ZZP.IjvNKoWg4lSSUDO.0Mf70ED.SKI4.LK',
            // パスワード：hanako0000
        ]);

        $user1->assignRole('user');

        $user2 = User::create([
            'name' => '山田太郎',
            'email' => 'tarou@test.com',
            'email_verified_at' => new DateTime(),
            'password' => '$2y$10$y1eAeyPJetJ8MJ/lQNOy5urOehbFrTgk43pzfgfAyMioGFWCVjbly',
            // パスワード：tarou0000
        ]);

        $user2->assignRole('user');

        $user3 = User::create([
            'name' => '山田次郎',
            'email' => 'jirou@test.com',
            'email_verified_at' => new DateTime(),
            'password' => '$2y$10$6i2suqlYwBeXCT4h5S6LReq6UPpJ/2enEKbhE6yqNaWhjNCx0t03.',
            // パスワード：jirou0000
        ]);

        $user3->assignRole('user');
    }
}
