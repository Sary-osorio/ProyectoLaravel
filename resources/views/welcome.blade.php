@extends('layouts.app')

@section('content')
    <h1>Welcome</h1>
    @empty($products)
        <div class="alert alert-danger">
            No hay productos
        </div>
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-3">
                    {{-- @include('components.productocart') --}}
                    @include('components.productocart')
                </div>
            @endforeach
        </div>
    @endempty
@endsection
