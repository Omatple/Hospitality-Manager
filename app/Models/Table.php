<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Table extends Model
{
    /** @use HasFactory<\Database\Factories\TableFactory> */
    use HasFactory;

    protected $fillable = ["number", "status"];

    /**
     * Get all of the orders for the Table
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function markAsOccupied(): void
    {
        $this->update(["status" => "occupied"]);
    }
    public function markAsAvailable(): void
    {
        $this->update(["status" => "available"]);
    }

    public function isOccupied(): bool
    {
        return $this->status === 'occupied';
    }
}
