<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'package_bookings';
    protected $fillable = ['package_id','name','email','phone','pax','message'];

    public function package(){
        return $this->belongsTo(Package::class);
    }
}
