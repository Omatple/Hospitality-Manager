<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;

class OrderService
{
    public function validateProducts($request): array
    {
        $validationRules = [];
        $orderProducts = Order::with("products")
            ->where('user_id', $request->user_id)
            ->where('table_id', $request->table_id)
            ->where('status', 'pending')
            ->first()?->products;
        $productStock = Product::pluck("stock", "id")->toArray();
        foreach ($productStock as $productId => $stock) {
            $availableStock = ($orderProducts?->where("id", $productId)->first()->pivot->quantity ?? 0) + $stock;
            $validationRules["product-$productId"] = ["nullable", "integer", "min:0", "max:$availableStock"];
        }
        $validatedData = $request->validate($validationRules);
        return collect($validatedData)
            ->mapWithKeys(fn($value, $key) => [str_replace("product-", "", $key) => $value])
            ->toArray();
    }


    public function createOrder(array $data, array $dataProducts): Order
    {
        $data["status"] = "pending";
        $data["total"] = 0;
        $order = Order::create($data);
        $order->syncOrderProducts($dataProducts);
        return $order;
    }

    public function updateOrder(array $dataProducts, Order $order): Order
    {
        $order->syncOrderProducts($dataProducts);
        return $order;
    }
}
