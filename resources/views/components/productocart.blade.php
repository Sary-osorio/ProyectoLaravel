<div class="card">
    <img src="card-img-top" src="{{ asset($product->images->first()->path) }}">
    <div class="card-body">
        <h4 class="text-right"><strong>${{ $product->precio }}</strong></h4>
        <h5 class="card-title"> {{ $product->titulo }}</h5>
        <p class="card-text">{{ $product->descripcion }}</p>
        <p class="card-text">{{ $product->stock }}</p>
    </div>
</div>
