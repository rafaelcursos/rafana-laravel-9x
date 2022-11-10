<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Image;
use App\Models\Product;
use App\Models\Showcase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

            $imagem = $request->image;

            $imageName= $imagem->store('/', 'public');
            $image->image = $imageName;

            $image->color = $request->color;

            $image->save();

            $img = Image::orderBy('id', 'desc')->first();
            $prod = Product::find($id);

            $prod->images()->attach(intval($img->id));


            return back()->with('msg', 'Imagem cadastrada com sucesso');

            exit;
        }

        return back()->with('error', 'Preencha todos os campos');
    }

    public function destroy($id, $product_id){

        $image = Image::find($id);
        $img = $image->image;

        $prod = Product::find($product_id);

        $prod->images()->detach(intval($id));
        Storage::disk('public')->delete($img);
        $image->delete();



        return back()->with('msg', 'Deletada com sucesso');
    }
}
