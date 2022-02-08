<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return view('productos.index');
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
        return view('productos.show');
    }
    public function destroy($product)
    {
        //
    }
}
