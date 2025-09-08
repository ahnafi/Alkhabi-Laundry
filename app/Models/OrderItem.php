<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use softDeletes;
    protected $fillable = [
        'order_id',
        'product_id',
        'service_id',
        'quantity',
        'weight',
        'price',
        'subtotal',
    ];

    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }

    public function service(): BelongsTo {
        return $this->belongsTo(Service::class);
    }

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
