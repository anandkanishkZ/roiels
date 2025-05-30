<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkouts extends Model
{
    protected $table = 'checkouts';
    protected $fillable = ['product_id','qty','total','fname','lname','company','country','street','street2','city','state','phone','email','payment_type'];
}
