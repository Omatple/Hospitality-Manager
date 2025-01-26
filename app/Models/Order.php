<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = ["user_id", "table_id", "status", "total"];

    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the table that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }

    /**
     * The products that belong to the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->withPivot(["quantity", "unit_price"])
            ->withTimestamps();
    }

    public function addProduct(int $productId, int $quantity): void
    {
        $product = Product::find($productId);
        $this->products()->attach($product->id, [
            "quantity" => $quantity,
            "unit_price" => $product->price
        ]);
        $this->increment("total", $quantity * $product->price);
    }

    public function syncProducts(array $dataProducts): void
    {
        $productIds = array_keys($dataProducts);
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');
        $productAttributes = [];
        $total = 0;
        foreach ($dataProducts as $id => $quantity) {
            $product = $products->get($id);
            if (!$product || $quantity <= 0) continue;
            $productAttributes[$id] = [
                "quantity" => $quantity,
                "unit_price" => $product->price,
            ];
            $total += $quantity * $product->price;
        }
        $this->products()->sync($productAttributes);
        $this->update(["total" => $total]);
    }

    public function updateProductsStock(): void
    {
        $products = $this->products;
        foreach ($products as $product) {
            $quantity = $product->pivot->quantity;
            $product->decrement("stock", $quantity);
        }
    }
}
