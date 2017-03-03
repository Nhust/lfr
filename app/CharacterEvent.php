<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharacterEvent extends Model
{
    protected $table='characters_event';
    protected $fillable = [
        'event_id', 'character_id', 'status',
    ];
}
