<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable =   ['title','slug','description','rank','image','meta_title','meta_keyword','meta_description','status','homepage','subtitle','created_by','updated_by','icon'];

    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }

    public function productLines(){
        return $this->hasMany(ProductLine::class);
    }
}
