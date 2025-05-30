<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['title','created_by','updated_by'];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
