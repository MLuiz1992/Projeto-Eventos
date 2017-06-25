<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function salas(){
        return $this->belongsToMany('App\Sala');
    }

    public function solicitantes(){
        return $this->belongsTo('App/Solicitante');
    }

}
