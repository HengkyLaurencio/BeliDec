<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Shop;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::factory(100)->recycle(Shop::factory(10)->recycle(Cart::factory(10)->create())->create())->create();
    }
}
