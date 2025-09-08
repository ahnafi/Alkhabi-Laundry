<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use softDeletes;

    protected $fillable = [
        "service_id",
        "name",
        "price"
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function orderItems(): HasMany {
        return $this->hasMany(OrderItem::class);
    }
}
