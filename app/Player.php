<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    public function game(){
        return $this->hasOne('App\Game', 'id');
    }

}
