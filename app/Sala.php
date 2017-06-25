<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    public function eventos(){
        return $this->belongsToMany('App\Evento');
    }
}
