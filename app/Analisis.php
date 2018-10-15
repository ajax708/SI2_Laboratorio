<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    //
    protected $table ='analisis';

     public function clasificacion(){
    	return $this->belongsTo('App\Clasificacion');
    }
     public function area(){
    	return $this->belongsTo('App\Area');
    }
}
