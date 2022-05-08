<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'monto', 'pago', 'order_id'
    ];

    protected $dates = [
        'pago',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
