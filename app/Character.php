<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'pseudo', 'race', 'classe', 'level','serveur', 'faction', 'itemLevel', 'user_id',
    ];

}
