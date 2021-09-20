<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    public function Opening()
    {
        return $this->hasMany('App\Opening');
    }
}
