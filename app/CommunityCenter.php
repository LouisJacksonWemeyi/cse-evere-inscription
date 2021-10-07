<?php

namespace App;

use App\Center;
use App\Registration;
use App\SessionDate;
use Illuminate\Database\Eloquent\Model;

class CommunityCenter extends Model
{
	public $timestamps = false;

	public function registrations()
	{
	    return $this->hasMany(Registration::class);
	}

	public function center()
	{
	    return $this->belongsTo(Center::class);
	}

	public function session_date()
	{
	    return $this->belongsTo(SessionDate::class);
	}
}
