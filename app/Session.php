<?php

namespace App;

use App\Registration;
use App\SessionDate;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
	
    public function session_dates()
    {
        return $this->hasMany(SessionDate::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

}
