<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\Table;

class OrderService
{
    public function validateProducts($request): array
    {
        $validateDataProducts = [];
        foreach (Product::pluck("stock", "id")->toArray() as $id => $stock) {
            $validateDataProducts[$id] = ["nullable", "integer", "min:0", "max:$stock"];
        }
        return $request->validate($validateDataProducts);
    }

    public function createOrder(array $data, array $dataProducts): Order
    {
        $data["status"] = "pending";
        $data["total"] = 0;
        $order = Order::create($data);
        foreach ($dataProducts as $id => $quantity) {
            if ($quantity > 0) $order->addProduct($id, $quantity);
        }
        return $order;
    }

    public function updateOrder(array $dataProducts, Order $order): Order
    {
        $order->syncProducts($dataProducts);
        return $order;
    }
}
