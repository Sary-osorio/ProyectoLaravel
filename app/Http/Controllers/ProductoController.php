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
        //
    }
    public function store()
    {
        //
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
