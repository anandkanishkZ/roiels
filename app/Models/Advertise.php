<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    protected $table = 'advertises';
    protected $fillable = ['title','image','rank','status','created_by','updated_by'];
}
