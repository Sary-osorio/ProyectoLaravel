@extends('layouts.master')

@section('content')

    <h1>Formulario crear</h1>
    <form method="POST" action="{{route('products.store')}}">
        @csrf
    <div class="form-row">
        <label>Titulo</label>
        <input class="form-control" type="text" name="titulo" required>
    </div>
    <div class="form-row">
        <label>Descripcion</label>
        <input class="form-control" type="text" name="descripcion" required>
    </div>
    <div class="form-row">
        <label>precio</label>
        <input class="form-control" type="number" min="1.00" step="0.01" name="precio" required>
    </div>
    <div class="form-row">
        <label>Stock</label>
        <input class="form-control" type="number" min="0"  name="stock" required>
    </div>
    <div class="form-row">
        <label>Estado</label>
       <select class="custom-select" name="estado" required>
        <option value="" selected>Seleccione</option>
           <option value="Disponible">Disponible</option>
           <option value="No disponible">No disponible</option>
       </select>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lg">Crear producto </button>
    </div>
    </form>

@endsection
