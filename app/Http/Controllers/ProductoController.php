<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return view('productos.index')->with([
            'products' => Producto::all(),
        ]);;
    }
    public function create()
    {
        return view('productos.create');
    }
    public function store()
    {
        // $product = Producto::create([
        //   'titulo' => request()->titulo,
        // 'descripcion' => request()->descripcion,
        //'precio' => request()->precio,
        //'stock' => request()->stock,
        //  'estado' => request()->estado,
        //]);

        $product = Producto::create(request()->all());

        return $product;
    }
    public function edit($product)
    {
        //
    }
    public function update($product)
    {
        //
    }
    public function show($product)
    {
        $product = Producto::findOrFail($product);
        return view('productos.show')->with([
            'product' => $product,
        ]);
    }
    public function destroy($product)
    {
        //
    }
}
