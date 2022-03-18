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
        $rules = [
            'titulo' => ['required', 'max:255'],
            'descripcion' => ['required', 'max:1000'],
            'precio' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'estado' => ['required', 'in:Disponible,No disponible'],
        ];
        request()->validate($rules);
        if (request()->estado == 'Disponible' && request()->stock == 0) {
            // session()->flash('error', 'No puede estar disponible si el stock es cero');
            return redirect()->back()
                ->withInput(request()->all())->withErrors('No puede estar disponible si el stock es cero');
        }
        $product = Producto::create(request()->all());
        // session()->flash('success', "El nuevo producto con id {$product->id} was created");


        return redirect()->route('products.index')
            ->withSuccess("El nuevo producto con id {$product->id} was created");
    }
    public function edit($product)
    {
        return view('productos.edit')->with([
            'product' => Producto::findOrFail($product),
        ]);
    }
    public function update($product)
    {
        $rules = [
            'titulo' => ['required', 'max:255'],
            'descripcion' => ['required', 'max:1000'],
            'precio' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'estado' => ['required', 'in:Disponible,No disponible'],
        ];
        request()->validate($rules);
        $product = Producto::findOrFail($product);
        $product->update(request()->all());
        return redirect()->route('products.index')
            ->withSuccess("El nuevo producto con id {$product->id} fue editado");
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
        return redirect()->route('products.index')
            ->withSuccess("El nuevo producto con id {$product->id} fue eliminado");
    }
}
