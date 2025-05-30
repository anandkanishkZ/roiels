<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['product_id','name','email','phone','image','rating','review','status'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
