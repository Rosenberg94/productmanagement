<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    use Importable, SkipsErrors;
    /**
     * @param array $row
     *
     * @return Product|null
     */
    public function model(array $row)
    {
         return new Product([
            'name'     => $row[0],
            'code'    => $row[1],
            'statement' => $row[2],
            'amount' => $row[3],
            'price' => $row[4],
            'manufacturer_id' => $row[5],
        ]);
    }
}
