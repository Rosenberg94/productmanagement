<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManufacturerStoreRequest;
use App\Http\Requests\ManufacturerUpdateRequest;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManufacturerController extends Controller
{
    public function create()
    {
        return view('manufacturer.create');
    }


    public function list()
    {
        $manufacturers = Manufacturer::orderByDesc('id')->paginate(2);

        return view('manufacturer.list', ['manufacturers' => $manufacturers], compact('manufacturers'));
    }


    public function store(ManufacturerStoreRequest $request)
    {
        $input = $request->except("_token");
        $file = $request->file('image');
        if($file){
            $input['image'] = $request->file('image')->store(
                'images', 'public');
        }
        $manufacturer = new Manufacturer();
        $manufacturer->fill($input);
        $manufacturer->save();

        return redirect(route('main'))->with('success','You succesfully added new manufacturer!');
    }


    public function edit(Request $request)
    {
        $manufacturer = Manufacturer::find($request->manufacturer_id);

        return view('manufacturer.edit', ['manufacturer' => $manufacturer]);
    }


    public function update(ManufacturerUpdateRequest $request)
    {
        $manufacturer = Manufacturer::find($request->id);
        $input = $request->except("_token");
        if ($manufacturer){
            $file = $request->file('image');
            if($file){
                $this->__manufacturerImageDestroy($request);
                $input['image'] = $request->file('image')->store(
                    'images', 'public');
            }
            $manufacturer->update($input);

            return redirect(route('manufacturer_list'))->with('success', 'Manufacturer has been successfully updated!');
        }

        return redirect(route('manufacturer_list'))->with('success','Manufacturer isn\'t isset!');
    }


    public function products(Request $request)
    {
        $products = $request->id ? Product::where('manufacturer_id', $request->id)->simplePaginate(20) : [];
        $manufacturers = Manufacturer::all();

        return view('product.list', compact('products', 'manufacturers'));
    }


    private function __manufacturerImageDestroy($request)
    {
        $manufacturer = Manufacturer::find($request->product);
        if (isset($manufacturer->image)){
            if(Storage::disk('public')->exists($manufacturer->image)){
                Storage::delete($manufacturer->image);
            }
        }
    }
}
