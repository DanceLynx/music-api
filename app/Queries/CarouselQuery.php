<?php
namespace App\Queries;

use App\Models\Carousel;
use Spatie\QueryBuilder\QueryBuilder;

class CarouselQuery extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct(Carousel::query());
    }
}
