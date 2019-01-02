<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use App\Traits\MediableTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Scene extends Model implements HasMedia
{
    use HasMediaTrait;
    use MediableTrait;

    protected $guarded = ['id','media'];

    public function choices(){                                       

        return $this->hasMany('App\Choice');

    }
    public function responses(){

        return $this->hasMany('App\Response');
    }

    public function games(){
        return $this->belongsToMany('App\Game', 'scene_id');
    }

    public function music(){
        return $this->hasOne('App\Sound', 'id','sound_id')->whereType('music');
    }
}
