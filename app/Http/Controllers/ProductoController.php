<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Producto;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        ]);
    }
    public function create()
    {
        return view('productos.create');
    }
    public function store(ProductoRequest $request)
    {
        $product = Producto::create($request->validated());
        //dd($request->images);
        foreach ($request->images as $image) {
            $product->images()->create([
                'path' => 'images/' . $image->store('products', 'images'),
            ]);
        }
        return redirect()->route('products.index')
            ->withSuccess("El nuevo producto con id {$product->id} se ha creado");
    }

    public function edit(Producto $product)
    {
        return view('productos.edit')->with([
            'product' => $product,
        ]);
    }
    public function update(ProductoRequest $request, Producto $product)
    {

        //dd($request->validated());
        $product->update($request->validated());
        if ($request->hasFile('images')) {
            foreach ($product->images as $image) {
                // $path = storage_path("app/public/{$image->path}");
                //dd($path);
                Storage::disk('public')->delete($image->path);
                $image->delete();
            }
            foreach ($request->images as $image) {
                $product->images()->create([
                    'path' => 'images/' . $image->store('products', 'images'),
                ]);
            }
        }

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
