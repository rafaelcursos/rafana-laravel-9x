<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('/admin.products_type', ['types' => $types]);
    }

    public function store(Request $request)
    {
        if($request->type){
            $type = new Type();

            $type->type = $request->type;
    
            $type->save();
    
            return redirect('/products_type')->with('msg', 'cadastrado com sucesso');
        }
        return redirect('/products_type')->with('error', 'Preencha um tipo de produto');
    }
}
