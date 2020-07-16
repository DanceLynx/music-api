<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{

    public function singer()
    {
        return $this->belongsTo(Singer::class);
    }

    public function cover()
    {
        return $this->belongsTo(Cover::class);
    }
}
