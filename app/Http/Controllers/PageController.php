<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\Showcase;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {

        $showcase = Showcase::all();
        return view('page_showcase', ['showcase' => $showcase]);
    }

    public function pagebases($id)
    {
        $bases = Showcase::find($id)->products()->where('products.type', 'Base')->get();
        $tampos = Showcase::find($id)->products()->where('products.type', 'Tampo')->get();

        foreach ($tampos as $t) {
            foreach ($t->images as $i) {
                $tampo = $i->image;
            }
        }

        foreach ($bases as $b) {
            foreach ($b->images as $i) {
                $base = $i->image;
            }
        }

        return view('page_select', ['base' => $base, 'tampo' => $tampo, 'bases' => $bases, 'id' => $id]);
    }

    public function pagetampos($id){
        $tampos = Showcase::find($id)->products()->where('products.type', 'Tampo')->get();

        foreach ($tampos as $t) {
            foreach ($t->images as $i) {
                $tampo = $i->image;
            }
        }

        return view('page_tampos', ['tampos' => $tampos, 'tampo' => $tampo]);
    }

    public function pagecadeiras(){
        $cadeiras = Product::where('type', '=', 'Cadeira')->get();

        return view('/page_cadeiras', ['cadeiras' => $cadeiras]);
    }
}
