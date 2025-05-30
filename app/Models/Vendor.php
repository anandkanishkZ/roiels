<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use  Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name', 'name', 'username','email','password','last_login','address','temporary_address','city','state','pan','verification_key','reset_token','status','verify','about','bank','branch','account_name','account_number','website','image2','phone','mobile','contact_person_email','contact_person_address','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
