<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Showcase;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShowcaseController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $showcase = Showcase::all();
        return view('/admin.showcase_insert', ['product' => $product, 'showcase' => $showcase]);
    }

    public function join($id)
    {
        $products = Product::all();
        $showcase = Showcase::find($id);
        $colors = Color::all();
        return view('/admin.showcase_join_product', ['products' => $products, 'showcase' => $showcase, 'colors' => $colors]);
    }

    public function joinStore(Request $request){
        $showcase = Showcase::find($request->showcase);

        $showcase->products()->attach(intval($request->product));

        return redirect('/showcase_join/'. $showcase->id)->with('msg', 'Tudo certo');
    }

    public function removejoin($show_id, $product_id){

        $showcase = Showcase::find($show_id);

        $showcase->products()->detach(intval($product_id));

        return redirect('/showcase_join/'. $showcase->id)->with('msg', 'Tudo certo');
    }

    public function all()
    {
        $types = Type::all();
        return view('/admin/products_type', ['types' => $types]);
    }

    public function store(Request $request)
    {
        if ($request->name && $request->description && $request->image) {
            $showcase = new showcase();

            $showcase->name = $request->name;
            $showcase->description = $request->description;

            $image = $request->image;
            $imageName = $image->store('/', 'public');

            $showcase->image = $imageName;

            $showcase->save();

            return back()->with('msg', 'Cadastrado com sucesso!');
        }

        return redirect('/showcase_insert')->with('error', 'Preencha todos os dados');
    }

    public function update($id)
    {
        $showcase = Showcase::find($id);
        return view('/admin.showcase_update', ['showcase' => $showcase]);
    }

    public function updateAction(Request $request, $id)
    {

        if ($request->name && $request->description) {
            $showcase = new showcase();

            $showcase->name = $request->name;
            $showcase->description = $request->description;

            $image = $request->image;
            $imageName = $image->store('/', 'public');

            $showcase->image = $imageName;

            $showcase->save();

            return back()->with('msg', 'Atualizado com sucesso!');
        }

        return back()->with('error', 'Preencha todos os dados');
    }

    public function destroy($id)
    {
        $showcase = Showcase::find($id);

        $img = $showcase->image;
        Storage::disk('public')->delete($img);
        
        $showcase->delete();

        return back()->with('msg', 'Deletado com sucesso!');
    }
}
