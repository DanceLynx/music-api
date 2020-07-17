<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CoverResource;
use App\Queries\CoverQuery;

class CoversController extends Controller
{
    public function index(CoverQuery $query)
    {
        $covers = $query->paginate();
        return CoverResource::collection($covers);
    }

    public function show($coverId , CoverQuery $query)
    {
        $cover = $query->findOrFail($coverId);
        return new CoverResource($cover);
    }
}
