<?php

namespace App\Http\Controllers;

use App\Exports\GoodsExports;
use App\Exports\ProductsExport;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Nullable;


class ProductController extends Controller
{
    public function list()
    {
        $products = Product::simplePaginate(20);

        return view('list', ['products' => $products], compact('products'));
    }

    public function create()
    {
        $manufacturers = Manufacturer::all();

        return view('product.create', ['manufacturers' => $manufacturers]);
    }

    public function store(ProductStoreRequest $request)
    {
        $input = $request->except("_token");
        $file = $request->file('image');
        if($file){
            $input['image'] = $request->file('image')->store(
                'images', 'public');
        }
        $product = new Product();
        $product->fill($input);
        $product->save();

        return redirect(route('main'))->with('success','You successfully added new product!');
    }

    public function edit(Request $request)
    {
        $product = Product::find($request->product_id);

        return view('product.edit', ['product' => $product]);
    }

    public function update(Request $request)
    {
        $input = $request->except("_token");
        $request->validate([
            'name' => ['bail', 'required', 'string', 'max:255'],
            'code' => ['bail', 'required', 'string', 'max:255'],
            'amount' => ['bail', 'integer', 'max:255255'],
            'price' => ['max:12'],
            'manufacturer_id' => ['bail', 'integer', 'max:1000'],
        ]);

        $file = $request->file('image');
        if($file){
            $input['image'] = $request->file('image')->store(
                'images', 'public');
        }
        $product = Product::find($request->id);
        $product->update($input);
        $product->save();

        return redirect(route('list'))->with('success','You successfully updated product!');
    }

    public function manage()
    {
        return view('product.manage');
    }

    public function import()
    {
        Excel::import(new ProductsImport, 'products.xls');

        return redirect('/')->with('success', 'All good!');
    }

    public function exportExcel()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function show()
    {
        return view('product.import');
    }

    public function storeExcel(Request $request)
    {
       $file = $request->file('file');
       Excel::import(new ProductsImport, $file);

       return redirect('/')->with('success','You successfully created Your certificate!');
    }

}
