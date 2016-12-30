<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'pseudo', 'race', 'classe', 'level', 'faction', 'itemLevel', 'user_id',
    ];

}
