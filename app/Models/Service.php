<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $fillable = [
        "name",
        "description",
        "unit",
        "price_per_unit"
    ];

    public function orderItems(): HasMany {
        return $this->hasMany(OrderItem::class);
    }

}
