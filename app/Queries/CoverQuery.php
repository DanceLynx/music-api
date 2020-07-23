<?php
namespace App\Queries;

use App\Models\Cover;
use Spatie\QueryBuilder\QueryBuilder;

class CoverQuery extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(Cover::query());
        $this->allowedIncludes(['songs','songs.singer'])
            ->allowedFilters(['is_hot','is_recommend']);
    }
}
