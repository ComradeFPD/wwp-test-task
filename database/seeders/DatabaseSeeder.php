<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
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
       Product::factory()->count(10)->hasCategories(Category::factory()->count(5)->create())
           ->create();
       User::factory()->count(10)->create();
       User::factory()->create([
           'is_admin' => true
       ]);
    }
}
