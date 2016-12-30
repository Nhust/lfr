<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterEvent extends Model
{
    protected $fillable = [
        'event_id', 'character_id', 'status',
    ];
}
