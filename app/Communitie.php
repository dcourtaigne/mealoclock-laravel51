<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class Communitie extends Model
{

	protected $table = 'communities';


    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
