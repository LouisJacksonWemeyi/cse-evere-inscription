<?php

namespace App;

use App\CommunityCenter;
use App\Session;
use App\SessionDate;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

	protected $dates = ["child_birthday","paid_date"];

	public function community_center()
	{
	    return $this->belongsTo(CommunityCenter::class);
	}

	public function session()
	{
	    return $this->belongsTo(Session::class);
	}

	public function session_dates()
	{
	    return $this->belongsToMany(SessionDate::class);
	}
}
