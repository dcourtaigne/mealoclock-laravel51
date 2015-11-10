<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
		'title',
		'details',
		'guests',
		'date',
		'time',
		'location',
		'address',
		'image',
		'community_id'
	];

	protected $dates = ['date'];

	public static function findOrFail($id) {
		return Event::find($id) ? : abort(404);
	}

	public function firstOrFail($columns = ['*'])
    {
        if (! is_null($model = $this->first($columns))) {
            return $model;
        }
        throw (new ModelNotFoundException)->setModel(get_class($this->model));
    }


    public function setDateAttribute($date)
	{
		$this->attributes['date'] = Carbon::parse($date);
	}

	public function getDateAttribute($date)
	{
		return Carbon::parse($date)->format('Y-m-d');
	}

	/**
	 * Eloquent model to get all the events with orgzanizer's (user) name and community's info
	 * @return Collection of event
	 */
	public static function getEventAndOwner()
	{
		return Event::with(array('user' => function($query)
						                    { 
						                        $query->select('id', 'name');
						                    },'communitie'))
     				->get();                   
	}

	/**
	 * Query builder to get the events of a community including the name of the organizer (user)
	 * 
	 * @param  string $community from the URL
	 * @return Array of events including community's shortname and organizer's (user) name 
	 */
	public static function getEventAndOwnerbyCom($comId)
	{
		return Event::with(array('user' => function($query) use($comId)
						                    { 
						                        $query->select('id', 'name');
						                    }))
					->where('communitie_id', '=', $comId)
     				->get();
    }
	
    /**
     * An event belongs to exactly 1 user (organizer) (fk user_id)
     * @return ELOQUENT RELATIONSHIP
     */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	   /**
     * An event belongs to exactly 1 user (organizer) (fk user_id)
     * @return ELOQUENT RELATIONSHIP
     */
	public function users()
	{
		return $this->belongsToMany('App\User', 'event_user', 'event_id', 'guest_id')
					->withPivot('status', 'message')
					->groupBy('status')
					->withTimestamps();
	}


	/**
	 * An event belongs to exactly 1 community (fk community_id)
	 * @return ELOQUENT RELATIONSHIP
	 */
	public function communitie()
	{
		return $this->belongsTo('App\Communitie');
	}

	public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }
}
