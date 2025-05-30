<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';
    protected $fillable = ['order_id','vendor_id','product_id','quantity','price','description','status','color','size'];
}
