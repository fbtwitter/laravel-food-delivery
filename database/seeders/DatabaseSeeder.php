<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Restaurant;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
        ]);

        $this->seedDemoRestaurants();
    }

    public function seedDemoRestaurants(): void
    {
        $products = Product::factory(7);
        $categories = Category::factory(5)->has($products, "products");
        $restaurant = Restaurant::factory()->has($categories, "categories");

        User::factory(50)->vendor()->has($restaurant)->create();
    }
}
