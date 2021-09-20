<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opening extends Model
{
    public function Workshop()
    {
        return $this->belongsTo('App\Workshop');
    }

    public function Booking()
    {
        return $this->hasMany('App\Opening');
    }
}
