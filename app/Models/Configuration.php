<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = 'configurations';
    protected $fillable = ['name','title','title2','logo','email','email2','phone','mobile','address','info','facebook','twitter','youtube','instagram','meta_title','meta_keyword','meta_description','vehicle','created_by','updated_by'];
}
