<?php

namespace App\Models;

class Singer extends Model
{

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
