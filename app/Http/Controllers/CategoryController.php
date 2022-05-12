<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function allCategories()
    {
        $categories = Category::all();

        return view('category.categories', ['categories' => $categories]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function update(Request $request)
    {
        $data = $request->except("_token");
        $category = new Category();
        $category->parent = $data['parent'];
        $category->name = $data['name'];
        $category->save();

        return redirect(route('main'));
    }

    public function edit(Request $request)
    {
        $category = Category::find($request->id);

        return view('category.edit', ['category' => $category]);
    }

    public function store(Request $request)
    {;
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        $category = Category::find($request->id);
        $category->update(['name' => $request->name]);

        return redirect(route('categories'))->with('success', 'Successfully');
    }

    public function destroy(Request $request)
    {
        $category_id = $request->id;
        $category = Category::find($category_id);
        if ($category){
            $category->delete();
        }
        return redirect(route('categories'));
    }
}
