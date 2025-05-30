<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['customer_id','name','company','district','country','street','street2','city','phone','mobile','note','shipping','email','order_date','order_status','payment_mode','payment_key','total_amount','subtotal','status'];
}
