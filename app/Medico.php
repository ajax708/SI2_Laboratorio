<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    //
     public function persona()
    {
        return $this->belongsTo('App\Persona','id');
    }
}
