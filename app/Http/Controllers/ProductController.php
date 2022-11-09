<?php

namespace App\Http\Controllers;

use App\Models\Complement;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $products = Product::all();

        return view('/admin.products_insert', ['types' => $types, 'products' => $products]);
    }

    public function all()
    {
        $products = Product::all();
        return view('/admin.products_all', ['products' => $products]);
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
            $product->type = $request->type;
    
            $product->save();
    
            return redirect('/products_insert')->with('msg', 'Cadastrado com sucesso!');
        }

        return redirect('/products_insert')->with('error', 'Preencha todos os dados');
    }

    public function update($id)
    {
        $product = Product::find($id);

        $types = Type::all();
        return view('/admin/products_update', ['product' => $product, 'types' => $types]);
    }

    public function updateAction(Request $request, $id)
    {
        if($request->name && $request->description){

            $product = Product::find($id);


            $product->name = $request->name;
            $product->height = $request->height;
            $product->width = $request->width;
            $product->lenght = $request->lenght;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->type = $request->type;
    
            $product->save();

            return redirect('/products_insert')->with('msg', 'Atualizado com sucesso!');
        }

        return redirect('/products_insert')->with('error', 'Preencha todos os dados');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/products_insert')->with('msg', 'Deletado com sucesso!');
    }
}
