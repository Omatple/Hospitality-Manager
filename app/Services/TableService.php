<?php

namespace App\Services;

use App\Models\Table;
use App\Models\Order;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class TableService
{
    public function getLastOrder(Table $table): Order|null
    {
        return Order::with('products')
            ->where('table_id', $table->id)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function getCategoriesWithProducts(): Collection
    {
        return Category::with('products')->orderBy('name')->get();
    }

    public function getAllUsers(): Collection
    {
        return User::orderBy('name')->get();
    }
}
