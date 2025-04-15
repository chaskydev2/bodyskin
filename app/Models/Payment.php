<?php

namespace App\Models;

use App\Traits\Encryptable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory, Encryptable;

    /**
     * Obtener los campos que deben ser encriptados.
     *
     * @return array
     */
    protected function getEncryptableFields()
    {
        return [
            'card_number',
            'cvv'
        ];
    }

    protected $fillable = [
        'user_id',
        'amount',
        'card_number',
        'cvv',
        'cardholder_name',
        'expiry_date',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
