<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('/admin.products_color', ['products' => $products]);
    }

    public function store(Request $request)
    {
        if($request->color){
            $color = new Color();        
            $color->color = $request->color;
            $color->save();
            return redirect('/products_color')->with('msg', 'Cadastrado com sucesso!');
        }

        return redirect('/products_color')->with('error', 'Preencha o nome de uma cor!');

    }
}
