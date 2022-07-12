<div class="card mb-2">
    <div id="carousel{{ $product->id }}" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            @foreach ($product->images as $image)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img class="d-block w-100 card-img-top" src="{{ asset('storage/' . $image->path) }}" height="500">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $product->id }}"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" data-bs-target="#carousel{{ $product->id }}" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <div class="card-body">
        <h4 class="text-right"><strong>${{ $product->precio }}</strong></h4>
        <h5 class="card-title">{{ $product->titulo }}</h5>
        <p class="card-text">{{ $product->descripcion }}</p>
        <p class="card-text"><strong>{{ $product->stock }} en stock</strong></p>
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
        @else --}}
        <form class="d-inline" method="POST"
            action="{{ route('products.carts.store', ['product' => $product->id]) }}">
            @csrf
            <button type="submit" class="btn btn-warning">Ver</button>
            <button type="submit" class="btn btn-success">Añadir al carrito</button>
        </form>
        {{-- @endif --}}
    </div>
</div>
