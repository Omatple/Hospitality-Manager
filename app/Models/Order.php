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

    public function syncOrderProducts(array $productData): void
    {
        $productIds = array_keys($productData);
        $availableProducts = Product::whereIn('id', $productIds)->get()->keyBy('id');
        $previousQuantities = $this->products()->pluck("quantity", "product_id")->toArray();
        $updatedProducts = [];
        $orderTotal = 0;
        foreach ($productData as $productId => $quantity) {
            $product = $availableProducts->get($productId);
            if ($quantity <= 0 && !isset($previousQuantities[$productId])) {
                continue;
            }
            $updatedProducts[$productId] = [
                "quantity" => $quantity,
                "unit_price" => $product->price,
            ];
            $orderTotal += $quantity * $product->price;
        }
        $this->products()->sync($updatedProducts);
        $this->updateProductStock($previousQuantities);
        $this->update(["total" => $orderTotal]);
    }


    public function updateProductStock(array $previousQuantities): void
    {
        $orderProducts = $this->products;
        foreach ($orderProducts as $product) {
            $currentQuantity = $product->pivot->quantity;
            $previousQuantity = $previousQuantities[$product->id] ?? 0;
            $stockDifference = $currentQuantity - $previousQuantity;
            if ($stockDifference > 0) {
                $product->decrement("stock", $stockDifference);
            } elseif ($stockDifference < 0) {
                $product->increment("stock", abs($stockDifference));
            }
        }
        $this->products()
            ->where("quantity", 0)
            ->get()
            ->each(fn($product) => $product->pivot->delete());
    }


    public function markAsServed(): void
    {
        $this->update(["status" => "served"]);
    }
}
