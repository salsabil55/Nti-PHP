<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // fillable refer to this must be added
    protected $fillable = [
        'name_en',
        'name_ar',
        'price',
        'quantity',
        'status',
        'brand_id',
        'subcategory_id',
        'desc_ar',
        'desc_en',
        'image'
    ];


    public function getImageAttribute($value)
    {
        return url('/').'/images/products/'.($value);
    }
}
