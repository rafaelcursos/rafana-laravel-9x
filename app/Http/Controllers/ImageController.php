<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $colors = Color::all();
        return view('admin/products_image', ['products' => $products, 'colors' => $colors]);
    }

    public function store(Request $request)
    {

        if ($request->image && $request->product) {

            $image = new Image();

            if ($request->hasfile('image') && $request->file('image')->isvalid()) {
                $imagem = $request->image;
                $extensao = $imagem->extension();
                $imageName = md5($imagem->getClientOriginalName() . strtotime('now')) . '.' . $extensao;
                $imagem->move(public_path('/img'), $imageName);

                $image->image = $imageName;
            }

            $image->color = $request->color;

            $image->save();

            $img = Image::orderBy('id', 'desc')->first();
            $prod = Product::find($request->product);

            $prod->images()->attach(intval($img->id));


            return redirect('/products_image')->with('msg', 'Imagem cadastrada com sucesso');

            exit;
        }

        return redirect('/products_image')->with('error', 'Preencha todos os campos');
    }
}
