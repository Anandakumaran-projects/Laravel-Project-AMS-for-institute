<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='permissions';
    protected $fillable = ['user_id', 'reason'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
