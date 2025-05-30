<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable =   ['title','slug','description','rank','image','meta_title','meta_keyword','meta_description','status','created_by','updated_by'];
}
