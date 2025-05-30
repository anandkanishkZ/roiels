<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $fillable = ['type','title','slug','link','rank','description','image','status','created_by','updated_by'];
}
