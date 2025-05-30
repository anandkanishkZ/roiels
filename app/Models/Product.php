<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title','slug','price','offer','offer_text','qty','description','image','image2','rank','code','brand','length','weight','height','width','warranty','status','top_ten','we_also_deal','our_product','best_selling','feature_key','offer_expire','meta_title','meta_keyword','meta_description','vendor','created_by','updated_by'];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function subcategories(){
        return $this->belongsToMany(Subcategory::class);
    }
    public function productLines(){
        return $this->belongsToMany(ProductLine::class);
    }
    public function colors(){
        return $this->belongsToMany(Color::class);
    }
    public function sizes(){
        return $this->belongsToMany(Size::class);
    }
    public function specifications(){
        return $this->hasMany(ProductSpecification::class);
    }
    public function wholesales(){
        return $this->hasMany(ProductWholesale::class);
    }
    public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

}
