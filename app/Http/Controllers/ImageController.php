<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\Showcase;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index($id)
    {
        $product = Product::find($id);

        $colors = Color::all();
        return view('/admin.products_image', ['product' => $product, 'colors' => $colors]);
    }

    public function store(Request $request, $id)
    {

        if ($request->image && $request->color) {

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
            $prod = Product::find($id);

            $prod->images()->attach(intval($img->id));


            return redirect('/products_insert')->with('msg', 'Imagem cadastrada com sucesso');

            exit;
        }

        return redirect('/products_insert')->with('error', 'Preencha todos os campos');
    }

    public function delete($id){
        echo $id;
    }
}
