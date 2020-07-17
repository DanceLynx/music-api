<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    const IS_RECOMMEND_NO = 0;
    const IS_RECOMMEND_YES = 1;
    const IS_HOT_NO = 0;
    const IS_HOT_YES = 0;
    static $isRecommendOptions = [
        self::IS_RECOMMEND_NO => '是',
        self::IS_RECOMMEND_YES =>'否',
    ];
    static $isHotOptions = [
        self::IS_HOT_NO => '是',
        self::IS_HOT_YES => '否',
    ];


    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
