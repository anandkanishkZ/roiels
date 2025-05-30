<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';
    protected $fillable =   ['title','slug','price','offer','description','rank','image','meta_title','meta_keyword','meta_description','status','vehicle','created_by','updated_by'];
}
