<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function foo()
    {
        echo 'foo';
        $prods = Product::paginate(2);
        dump($prods);
        dump($prods['currentPage']);
        dump($prods->currentPage());
        dump($prods->lastPage());
        dump($prods->items());
    }

}
