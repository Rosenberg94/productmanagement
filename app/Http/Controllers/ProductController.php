<?php

namespace App\Http\Controllers;

use App\Exports\GoodsExports;
use App\Exports\ProductsExport;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Traits\ProductTrait;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Nullable;


class ProductController extends Controller
{
    use ProductTrait;

    public function list(Request $request)
    {
        $category_id = $request->category_id;
        $manufacturer_id = $request->manufacturer_id;

        if($manufacturer_id){
            $products = Product::where('manufacturer_id', $manufacturer_id)->orderByDesc('id')->paginate(20);
        } elseif ($category_id) {
            $products = Product::where('category_id', $category_id)->orderByDesc('id')->paginate(20);
        } else {
            $products = Product::orderByDesc('id')->paginate(20);
        }

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
        Product::create($this->getProductData($request));

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

            return redirect(route('main'))->with('success', 'Product has been successfully updated!');
        }

        return redirect(route('main'))->with('success','Product isn\'t isset!');
    }


    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        if ($product){
            if($this->__authUserCheck($product)){
                $product->delete();

                return redirect(route('main'))->with('success', 'Product has been successfully deleted!');
            }
            return back()->withErrors( 'You have no access for this action!');
        }
        return back()->withErrors( 'This product is not exist already!');
    }


    private function __authUserCheck($product)
    {
        $user = auth()->user();

        return $user->role_id == User::ROLE_ADMIN;
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
