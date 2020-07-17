<?php
namespace App\Queries;

use App\Models\Singer;
use Spatie\QueryBuilder\QueryBuilder;

class SingerQuery extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(Singer::query());
    }
}
