<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table='attendances';
   
     protected $fillable = [
        'user_id',
        'check_in_time',
        'check_out_time',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
