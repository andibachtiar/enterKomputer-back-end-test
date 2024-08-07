<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ["id", "created_at", "updated_at"];

    protected $with = ["table"];

    protected function casts(): array
    {
        return [
            'order_items' => 'array',
        ];
    }

    /**
     * Get the table that owns the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }
}
