<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'order_id',
        'user_id',
        'code',
        'gateway_transaction_id',
        'payment_method',
        'payment_channel',
        'amount',
        'currency',
        'status',
        'payment_token',
        'signature',
        'callback_response',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'callback_response' => 'array',
        'amount' => 'decimal:2',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
