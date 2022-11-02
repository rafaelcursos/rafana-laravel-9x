<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $products = Product::where('showcase', '=', 1)->get();
        foreach($products as $p){
            $image = $p->images->first();
        }
        return view('page_showcase', ['products' => $products, 'image' => $image]);
    }

    public function pageSelect($id)
    {

        return view('page_select');
    }
}
