<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'nom', 'nbCharacters', 'date', 'instance_id', 'user_id',
    ];
}
