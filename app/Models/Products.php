<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Products extends Model
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
}
