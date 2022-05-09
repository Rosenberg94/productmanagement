<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $category_id = $request->category_id;

        if($category_id){
            $products = Product::where('category_id', $category_id)->orderByDesc('created_at')->simplePaginate(10);
        } else {
            $products = Product::orderByDesc('created_at')->simplePaginate(10);
        }
        $categories = Category::all();

        return view('main', ['products' => $products, 'categories' => $categories]);
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
