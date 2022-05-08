<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use  HasFactory;
    protected $fillable = [
        'titulo', 'descripcion', 'precio', 'stock', 'estado',
    ];

    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }
}
