<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    protected $table = 'payment_history';

    protected $fillable = [
        'user_id',
        'membership_id',
        'transaction_id',
        'amount',
        'currency',
        'payment_status',
        'payment_method_type',
        'card_last_four',
        'card_brand',
        'error_message'
    ];

    protected $casts = [
        'amount' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function wasSuccessful()
    {
        return $this->payment_status === 'succeeded';
    }
} 