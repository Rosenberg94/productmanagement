<?php

namespace App\Http\Controllers;

use App\Exports\GoodsExports;
use App\Exports\ProductsExport;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Imports\ProductsImport;
use Illuminate\Support\Facades\Storage;
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
        $categories = Category::all();

        return view('product.create', ['manufacturers' => $manufacturers, 'categories' => $categories]);
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

    public function update(ProductUpdateRequest $request)
    {
        $product = Product::find($request->id);
        $input = $request->except("_token");

        if ($product){
            $file = $request->file('image');
            if($file){
                $this->__productImageDestroy($request);
                $input['image'] = $request->file('image')->store(
                    'images', 'public');
            }
            $product->update($input);

            return redirect(route('list'))->with('success', 'Product has been successfully updated!');
        }

        return redirect(route('list'))->with('success','Product isn\'t isset!');
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

    private function __productImageDestroy($request)
    {
        $product = Product::find($request->product);
        if (isset($product->image)){
            if(Storage::disk('public')->exists($product->image)){
                Storage::delete($product->image);
            }
        }
    }

}
