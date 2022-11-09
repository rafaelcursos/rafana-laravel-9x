<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Showcase;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::all();
        $showcase = Showcase::all();

        return view('/admin.showcase_insert', ['product' => $product, 'showcase' => $showcase]);
    }
}
