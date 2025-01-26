<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Table;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory("users/images");
        Storage::deleteDirectory("products/images");

        Storage::makeDirectory("users/images");
        Storage::makeDirectory("products/images");

        User::factory()->count(6)->create();
        Table::factory()->count(8)->create();
        $this->call(CategorySeeder::class);
        Product::factory()->count(40)->create();
        $this->call(OrderSeeder::class);
    }
}
