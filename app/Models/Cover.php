<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    const STATUS_START = 0;
    const STATUS_PASS = 1;
    const STATUS_UNPASS = 2;

    static $StatusOptions = [
        self::STATUS_START => '未处理',
        self::STATUS_PASS => '通过',
        self::STATUS_UNPASS => '未通过',
    ];


    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
