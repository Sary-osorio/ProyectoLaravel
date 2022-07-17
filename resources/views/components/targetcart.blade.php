<div class="card-body">
    <h1 class="card-title text-center">{{ $product->titulo }}</h1>
    <hr>
    <p class="card-text">{{ $product->descripcion }}</p>
    <h4 class="text-right"><strong>${{ $product->precio }}</strong></h4>
    <p class="card-text"><strong>{{ $product->stock }} existencias</strong></p>

</div>
