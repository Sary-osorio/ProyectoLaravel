<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProductoCartController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Producto $product)
    {
        // $cart = Cart::create();

        $cart = $this->getFromCookieOrCreate();
        $quantity = $cart->products()
            ->find($product->id)
            ->pivot
            ->quantity ?? 0;

        //syncWithoutDetaching
        $cart->products()->syncWithoutDetaching([
            $product->id => ['quantity' => $quantity + 1],
        ]);

        $cookie = Cookie::make('cart', $cart->id, 7 * 24 * 60);
        return redirect()->back()->cookie($cookie);
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

    public function getFromCookieOrCreate()
    {
        $cartId = Cookie::get('cart');
        $cart = Cart::find($cartId);

        return $cart ?? Cart::create();
    }
}
