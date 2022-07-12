<div class="card-body">
    <h1 class="card-title text-center">{{ $product->titulo }}</h1>
    <hr>
    <p class="card-text">{{ $product->descripcion }}</p>
    <h4 class="text-right"><strong>${{ $product->precio }}</strong></h4>
    <p class="card-text"><strong>{{ $product->stock }} existencias</strong></p>
    {{-- @if (isset($cart))
        <p class="card-text">{{ $product->pivot->quantity }} in your cart
            <strong>(${{ $product->total }})</strong>
        </p>
        <form class="d-inline" method="POST"
            action="{{ route('products.carts.destroy', ['cart' => $cart->id, 'product' => $product->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-warning">Remove From Cart</button>
        </form>
    @else
        <form class="d-inline" method="POST"
            action="{{ route('products.carts.store', ['product' => $product->id]) }}">
            @csrf
            <button type="submit" class="btn btn-success">Add To Cart</button>
        </form>
    @endif --}}
</div>
