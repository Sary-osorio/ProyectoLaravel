@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row  justify-content-center">
            <h1>Tu carrito</h1>
            @if (!isset($cart) || $cart->products->isEmpty())
                <div class="alert alert-warning">
                    El carrito esta vacio
                </div>
            @else
                {{-- <h4 class="text-center">Your cart total <strong>{{ $cart->total }}</strong></h4> --}}
                <a class="btn btn-success mb-3" href="{{ route('orders.create') }}">
                    Start Order
                </a>
                <div class="row">
                    @foreach ($cart->products as $product)
                        <div class="col-3">
                            {{-- @include('components.productocart') --}}
                            @include('components.productocart')
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
