<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CarouselResource;
use App\Queries\CarouselQuery;

class CarouselsController extends Controller
{
    public function index(CarouselQuery $query)
    {
        $carousels = $query->get();
        return CarouselResource::collection($carousels);
    }
}
