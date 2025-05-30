<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'companies';
    protected $fillable =   ['title','slug','description','rank','image','meta_title','meta_keyword','meta_description','status','created_by','updated_by'];
}
