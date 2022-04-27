<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromArray;

class GoodsExports implements FromArray
{
    /**
     * @return \int[][]
     */
    public function array(): array
    {
        $title = [[
            'id',
            'name',
            'amount',
            'code',
        ]];

        $prod = Product::all()->map(function ($item) {
            return [
                'name' => $item->name,
                'code' => $item->code,
                'amount' => $item->amount,
                'statement' => $item->statement,
                'price' => $item->price,
            ];
        });

        return $title + Product::all()->toArray();
    }
}
