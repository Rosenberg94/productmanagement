<?php

namespace App\Http\Traits;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


trait ProductTrait
{
    public function getProductData(Request $request)
    {
        $product_data = $request->except("_token");
        $file = $request->file('image');
        if($file){
            $product_data['image'] = $request->file('image')->store(
                'images', 'public');
        }

        return $product_data;
    }








}
