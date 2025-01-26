<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::factory()->count(40)->create();
        $products = Product::pluck("id")->toArray();
        $numProducts = count($products);

        $orders->each(function ($order) use ($products, $numProducts): void {
            for ($i = 0; $i < $numProducts; $i++) {
                $quantityProducts[] = random_int(1, 16);
            }
            $order->syncProducts(array_combine($products, $quantityProducts));
        });
    }
}
