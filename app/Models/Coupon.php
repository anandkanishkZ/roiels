<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected $fillable = ['title','code','discount','min','expiry','created_by','updated_by'];
}
