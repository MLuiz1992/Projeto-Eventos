<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function eventos()
    {
        return $this->hasMany('App\Evento');
    }

   
}
