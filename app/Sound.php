<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    public function scenes(){
        return $this->HasMany( 'App\Scene');
    }

    public function getUrlAttribute(){

      if($this->location == 'internal')
          return "/audio/".$this->source;
      else
          return $this->source;

    }
}
