<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

        $categories = Category::where('parent', null)->get()->map(function($item){
            return [
                'name' => $item->name,
            ];
        });

       dump($categories);
    }

}
