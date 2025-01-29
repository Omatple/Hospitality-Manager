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
        $products = Product::pluck("price", "id")->toArray();
        $orders->each(function ($order) use ($products): void {
            $selectedProducts = [];
            foreach ($products as $productId => $unitPrice) {
                $selectedProducts[$productId] = [
                    "quantity" => random_int(1, 16),
                    "unit_price" => $unitPrice,
                ];
            }
            $order->products()->sync($selectedProducts);
        });
    }
}
