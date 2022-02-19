@extends('layouts.master')

@section('content')
    <h1>Lista de Productos</h1>
    <a class="btn btn-success" href="{{route('products.create')}}">Crear</a>
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
                    <th>Acciones</th>
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
                    <td>
                        <a class="btn btn-link" href="{{route('products.show',['product'=> $row->id])}}">Ver</a>
                        <a class="btn btn-link" href="{{route('products.edit',['product'=> $row->id])}}">Editar</a>
                        <form method="POST" action="{{route('products.destroy',['product'=>$row->id])}}">
                        @csrf
                        @method('DELETE');
                        <button type="submit" class="btn btn-link">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endempty
    @endsection

