<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'email', 'firstname', 'lastname', 'phone', 'age','position_id',
    ];
}
