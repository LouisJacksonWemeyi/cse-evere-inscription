<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrationSessionDate extends Model
{
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
    protected $table = 'registration_session_date';
}
