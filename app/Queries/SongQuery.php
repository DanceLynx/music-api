<?php

namespace App\Queries;

use App\Models\Song;
use Spatie\QueryBuilder\QueryBuilder;

class SongQuery extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(Song::query());
        $this->allowedIncludes(['cover','singer']);
    }
}
