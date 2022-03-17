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
        if (request()->estado == 'Disponible' && request()->stock == 0) {
            session()->flash('error', 'No puede estar disponible si el stock es cero');
            return redirect()->back();
        }
        $product = Producto::create(request()->all());

        return redirect()->route('products.index');
    }
    public function edit($product)
    {
        return view('productos.edit')->with([
            'product' => Producto::findOrFail($product),
        ]);
    }
    public function update($product)
    {
        $product = Producto::findOrFail($product);
        $product->update(request()->all());
        return redirect()->route('products.index');
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
        $product = Producto::findOrFail($product);
        $product->delete();
        return redirect()->route('products.index');
    }
}
