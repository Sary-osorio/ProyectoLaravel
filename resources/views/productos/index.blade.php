@extends('layouts.master')

@section('content')
    <h1>Lista de Productos</h1>
    @empty($products)
    <div class="alert alert-warning">
        La lista de productos esta vacia.
    </div>

    @else


    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->titulo}}</td>
                    <td>{{$row->descripcion}}</td>
                    <td>{{$row->precio}}</td>
                    <td>{{$row->stock}}</td>
                    <td>{{$row->estado}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endempty
    @endsection

