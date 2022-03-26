@extends('layouts.app')

@section('content')
    <h1>Editar producto</h1>
    <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
        @csrf
        @method('PUT')
        <div class="form-row">
            <label>Titulo</label>
            <input class="form-control" type="text" name="titulo" value="{{ old('titulo') ?? $product->titulo }}"
                required>
        </div>
        <div class="form-row">
            <label>Descripcion</label>
            <input class="form-control" type="text" name="descripcion"
                value="{{ old('descripcion') ?? $product->descripcion }}" required>
        </div>
        <div class="form-row">
            <label>precio</label>
            <input class="form-control" type="number" min="1.00" step="0.01" name="precio"
                value="{{ old('precio') ?? $product->precio }}" required>
        </div>
        <div class="form-row">
            <label>Stock</label>
            <input class="form-control" type="number" min="0" name="stock" value="{{ old('stock') ?? $product->stock }}"
                required>
        </div>
        <div class="form-row">
            <label>Estado</label>
            <select class="custom-select" name="estado" required>
                <option value="" selected>Seleccione</option>
                <option
                    {{ (old('estado') == 'Disponible' ? 'selected' : $product->estado == 'Disponible') ? 'selected' : '' }}
                    value="Disponible">Disponible</option>
                <option
                    {{ (old('estado') == 'No disponible' ? 'selected' : $product->estado == 'No disponible') ? 'selected' : '' }}
                    value="No disponible">No disponible
                </option>
            </select>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg mt-3">Editar producto </button>
        </div>
    </form>
@endsection
