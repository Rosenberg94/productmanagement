<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent',
        'name',
        'code',
    ];

    protected $table = 'categories';

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        return self::where('id', $this->parent)->first();
    }

    public function child()
    {
        return self::where('parent', $this->id)->get();
    }


}
