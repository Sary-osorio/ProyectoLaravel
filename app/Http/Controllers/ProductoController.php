<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function store(ProductoRequest $request)
    {

        $product = Producto::create($request->validated());
        return redirect()->route('products.index')
            ->withSuccess("El nuevo producto con id {$product->id} was created");
    }

    public function edit(Producto $product)
    {
        return view('productos.edit')->with([
            'product' => $product,
        ]);
    }
    public function update(ProductoRequest $request, Producto $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index')
            ->withSuccess("El nuevo producto con id {$product->id} fue editado");
    }
    public function show(Producto $product)
    {
        // $product = Producto::findOrFail($product);
        return view('productos.show')->with([
            'product' => $product,
        ]);
    }
    public function destroy(Producto $product)
    {
        // $product = Producto::findOrFail($product);
        $product->delete();
        return redirect()->route('products.index')
            ->withSuccess("El nuevo producto con id {$product->id} fue eliminado");
    }
}
