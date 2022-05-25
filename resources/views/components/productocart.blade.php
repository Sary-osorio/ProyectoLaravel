<div class="card ">
    <img class="card-img-top " src="{{ asset($product->images->first()->path) }}" height="500">
    <div class="card-body">
        <h4 class="text-right"><strong>${{ $product->precio }}</strong></h4>
        <h4 class="text-right"><strong>{{ $product->id }}</strong></h4>
        <h5 class="card-title"> {{ $product->titulo }}</h5>
        <p class="card-text">{{ $product->descripcion }}</p>
        <p class="card-text">{{ $product->stock }}</p>
        <form class="d-inline" method="POST"
            action="{{ route('products.carts.store', ['product' => $product->id]) }}">
            @csrf
            <button type="submit" class="btn btn-success">Add to cart</button>
        </form>
    </div>
</div>
