<?php

namespace App;

use App\CommunityCenter;
use App\Registration;
use App\Session;
use Illuminate\Database\Eloquent\Model;

class SessionDate extends Model
{
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function registrations()
    {
        return $this->belongsToMany(Registration::class);
    }
    
    public function centers()
    {
        return $this->hasMany(CommunityCenter::class);
    }
}
