<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'statement',
        'amount',
        'price',
        'manufacturer_id',
        'category_id',
        'image',
    ];

    protected $table = "products";

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function  manufacturer(){
        return $this->belongsTo(Manufacturer::class);
    }
}
