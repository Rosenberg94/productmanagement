<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $products = Product::all()->map(function ($item) {
            return [
                'name' => $item->name,
                'code' => $item->code,
                'amount' => $item->amount,
                'statement' => $item->statement,
                'price' => $item->price,
            ];
        });

        return collect($products);
    }

    public function headings(): array
    {
        return [
            'Name',
            'Code',
            'Amount',
            'Statement',
            'Price',
        ];
    }
}
