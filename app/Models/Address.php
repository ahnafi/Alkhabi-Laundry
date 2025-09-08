<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'label',
        'recipient_name',
        'recipient_phone',
        'full_address',
        'notes',
    ];

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function pickupOrders(): HasMany {
        return $this->hasMany(Order::class, 'pickup_address_id');
    }

    public function deliveryOrders(): HasMany {
        return $this->hasMany(Order::class, 'delivery_address_id');
    }
}
