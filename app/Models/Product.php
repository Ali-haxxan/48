<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// $product->seller_id = Auth::guard('seller')->user()->id;
// $product->image = $last_img;
// $product->product_name = $request->product_name;
// $product->product_unique_id = uniqid();
// $product->category_id = $request->select_category;
// $product->year = $request->year;
// $product->catlogue_no = $request->catalogue_number;
// $product->country = $request->country;
// $product->state = $request->state;
// $product->city = $request->city;
// $product->start_at = $request->start_at;
// $product->start_price = $request->start_price;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'seller_id',
        'image',
        'product_name',
        'product_unique_id',
        'category_id',
        'year',
        'catlogue_no',
        'country',
        'state',
        'city',
        'start_at',
        'start_price',
    ];
    protected $casts = [
        'image' => 'array',
    ];
}
