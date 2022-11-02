<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('/admin/products_insert');
    }

    public function store(Request $request)
    {
        if($request->name && $request->description){
            $product = new Product();

            $product->name = $request->name;
            $product->height = $request->height;
            $product->width = $request->width;
            $product->lenght = $request->lenght;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->showcase = $request->showcase;
    
            $product->save();
    
            return redirect('/products_insert')->with('msg', 'Cadastrado com sucesso!');
        }

        return redirect('/products_insert')->with('error', 'Preencha todos os dados');
    }
}
