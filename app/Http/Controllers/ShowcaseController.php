<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Showcase;
use App\Models\Type;
use Illuminate\Http\Request;

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

        return redirect('/showcase_insert')->with('msg', 'Tudo certo');
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

            if ($request->hasfile('image') && $request->file('image')->isvalid()) {
                $image = $request->image;
                $extensao = $image->extension();
                $imageName = md5($image->getClientOriginalName() . strtotime('now')) . '.' . $extensao;
                $image->move(public_path('/img/showcase'), $imageName);

                $showcase->image = $imageName;
            }

            $showcase->save();

            return redirect('/showcase_insert')->with('msg', 'Cadastrado com sucesso!');
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

            $showcase = Showcase::find($id);


            $showcase->name = $request->name;
            $showcase->description = $request->description;

            if ($request->hasfile('image') && $request->file('image')->isvalid()) {
                $image = $request->image;
                $extensao = $image->extension();
                $imageName = md5($image->getClientOriginalName() . strtotime('now')) . '.' . $extensao;
                $image->move(public_path('/img/showcase/'), $imageName);

                $showcase->image = $imageName;
            }

            $showcase->save();

            return redirect('/showcase_insert')->with('msg', 'Atualizado com sucesso!');
        }

        return redirect('/showcase_insert')->with('error', 'Preencha todos os dados');
    }

    public function destroy($id)
    {
        $showcase = Showcase::find($id);
        $showcase->delete();

        return redirect('/showcase_insert')->with('msg', 'Deletado com sucesso!');
    }
}
