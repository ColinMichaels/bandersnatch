<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['player_id'];
    
    public function player(){
        return $this->belongsTo( 'App\Player', 'player_id');
    }

    public function scene(){

       return $this->belongsTo('App\Scene');
    }

}
