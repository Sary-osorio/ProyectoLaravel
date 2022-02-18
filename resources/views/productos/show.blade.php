@extends('layouts.master')

@section('content')

    <h1>{{$product->titulo}} ({{$product->id}})</h1>
    <p>{{$product->descripcion}}</p>
    <p>{{$product->precio}}</p>
    <p>{{$product->stock}}</p>
    <p>{{$product->estado}}</p>
@endsection

