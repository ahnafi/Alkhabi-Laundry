<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'service_id',
        'qty',
        'subtotal',
    ];

    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }

    public function service(): BelongsTo {
        return $this->belongsTo(Service::class);
    }

}
