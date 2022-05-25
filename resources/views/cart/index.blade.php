@extends('layouts.app')

@section('content')
    <h1>Tu carrito</h1>
    @if ($cart->products->isEmpty())
        <div class="alert alert-warning">
            El carrito esta vacio
        </div>
    @else
        <div class="row">
            @foreach ($cart->products as $product)
                <div class="col-3">
                    {{-- @include('components.productocart') --}}
                    @include('components.productocart')
                </div>
            @endforeach
        </div>
    @endif
@endsection
