<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Services\CartService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = $this->cartService->getFromCookie();
        if (!isset($cart) || $cart->products->isEmpty()) {
            return redirect()
                ->back()
                ->withErrors("Tu carrito esta vacio");
        }

        return view('orders.create')->with([
            'cart' => $cart,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $order = $user->orders()->create([
            'estado' => 'pendiente',
        ]);
        $cart = $this->cartService->getFromCookie();

        $cartProductWithQuantity = $cart
            ->products
            ->mapWithKeys(function ($product) {
                $element[$product->id] = ['quantity' => $product->pivot->quantity];
                return $element;
            });

        //dd($cartProductWithQuantity);

        $order->products()->attach($cartProductWithQuantity->toArray());

        return redirect()->route('orders.payments.create', ['order' => $order]);
    }
}
