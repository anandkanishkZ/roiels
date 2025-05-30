<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    protected $fillable = ['category_id','subcategory_id','title','slug','subtitle','country','day','night','trip_start_end','grade','altitude','season','group_min','group_max','accommodation','transportation','description','image','rank','meta_title','meta_keyword','meta_description','video','status','created_by','updated_by'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

    public function images(){
        return $this->hasMany(PackageGallery::class);
    }

    public function prices(){
        return $this->hasMany(PackagePrice::class);
    }

    public function itineries(){
        return $this->hasMany(PackageItinery::class);
    }

    public function costIncludes(){
        return $this->hasMany(PackageCostInclude::class);
    }

    public function costExcludes(){
        return $this->hasMany(PackageCostExclude::class);
    }
}
