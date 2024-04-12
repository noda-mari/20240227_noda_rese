<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Reserve;
use App\Models\Review;
use App\Models\ShopMenu;
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
        $this->call(ImageSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(ShopMenusTableSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StoreManagersTableSeeder::class);
        $this->call(ReservesTableSeeder::class);
        User::factory(10)->create();
        ShopMenu::factory(17)->create();
        Reserve::factory(6)->create();
        Review::factory(10)->create();
    }
}
