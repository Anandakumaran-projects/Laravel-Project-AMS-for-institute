<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
     protected $table='leaves';
    protected $fillable = ['user_id', 'reason'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
