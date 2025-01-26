<?php

namespace App\Services;

use App\Models\Table;
use App\Models\Order;
use App\Models\Category;
use App\Models\User;

class TableService
{
    public function getLastOrder(Table $table)
    {
        return Order::with('products')
            ->where('table_id', $table->id)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function getCategoriesWithProducts()
    {
        return Category::with('products')->orderBy('name')->get();
    }

    public function getAllUsers()
    {
        return User::orderBy('name')->get();
    }
}
