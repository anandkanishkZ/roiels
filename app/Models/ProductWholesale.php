<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductWholesale extends Model
{
    protected $fillable = ['product_id','wholesale_qty','wholesale_price'];
}
