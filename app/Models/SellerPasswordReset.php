<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerPasswordReset extends Model
{
    protected $table = "seller_password_resets";
    protected $guarded = ['id'];
    public $timestamps = false;
}
