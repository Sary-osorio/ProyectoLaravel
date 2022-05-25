<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoCartController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Producto $producto)
    {
        $cart = Cart::create();
        $quantity = $cart->products()
            ->find($producto->id)
            ->pivot
            ->quantity ?? 0;

        $cart->products()->attach([
            $producto->id => ['quantity' => $quantity + 1],
        ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto, Cart $cart)
    {
        //
    }
}
