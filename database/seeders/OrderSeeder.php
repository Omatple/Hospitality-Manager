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
            $orderTotal = 0;
            foreach ($products as $productId => $unitPrice) {
                $randomQuantity = random_int(1, 16);
                $orderTotal += $randomQuantity * $unitPrice;
                $selectedProducts[$productId] = [
                    "quantity" => $randomQuantity,
                    "unit_price" => $unitPrice,
                ];
            }
            $order->products()->sync($selectedProducts);
            $order->update(["total" => $orderTotal]);
        });
    }
}
