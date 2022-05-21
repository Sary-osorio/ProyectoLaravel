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
        return $this->morphedByMany(Cart::class, 'productable')->withPivot('quantity');
    }
    public function orders()
    {
        return $this->morphedByMany(Order::class, 'productable')->withPivot('quantity');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function scopeDisponible($query)
    {
        $query->where('estado', 'Disponible');
    }
}
