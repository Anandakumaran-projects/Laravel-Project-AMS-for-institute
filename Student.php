<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'dob',
        'cname',
        'joiningdate',
    ];
   
}
