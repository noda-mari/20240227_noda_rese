<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Reserve;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AreasTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StoreManagersTableSeeder::class);
        User::factory(10)->create();
        Reserve::factory(6)->create();
        Review::factory(10)->create();
    }
}
