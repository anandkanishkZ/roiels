<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleBooking extends Model
{
    protected $table = 'vehicle_bookings';
    protected $fillable = ['vehicle_name','name','email','phone','pax','country','message'];
}
