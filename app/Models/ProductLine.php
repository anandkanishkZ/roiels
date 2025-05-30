<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLine extends Model
{
    protected $fillable = ['category_id','subcategory_id','title','slug','rank','image','description','meta_title','meta_keyword','meta_description','status','created_by','updated_by'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class);
    }

}
