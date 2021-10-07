<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
	public $timestamps = false;

	public function centers()
	{
	    return $this->belongsToMany(CommunityCenter::class);
	}
}
