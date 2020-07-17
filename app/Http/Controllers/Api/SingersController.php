<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\SingerResource;
use App\Queries\SingerQuery;

class SingersController extends Controller
{
    public function index(SingerQuery $query)
    {
        $singers = $query->paginate();
        return SingerResource::collection($singers) ;
    }

    public function show($singerId , SingerQuery $query)
    {
        $singer = $query->findOrFail($singerId);
        return new SingerResource($singer);
    }
}
