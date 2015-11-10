<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{	
	protected $fillable = [
		'intro',
		'photo',
		'photo_thumb'
	];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
