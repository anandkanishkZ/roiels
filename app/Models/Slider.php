<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable =   ['title','subTitle','offer','link','description','rank','image','status','created_by','updated_by'];
}
