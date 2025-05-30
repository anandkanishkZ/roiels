<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';
    protected $fillable =   ['category_id','title','slug','description','rank','image','meta_title','meta_keyword','meta_description','status','created_by','updated_by'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function lineProducts(){
        return $this->hasMany(ProductLine::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
