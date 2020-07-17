<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CoverResource;
use App\Queries\CoverQuery;
use Illuminate\Http\Request;

class CoversController extends Controller
{
    public function index(Request $request,CoverQuery $query)
    {
        $perPage = intval($request->limit) ?:15;
        $covers = $query->paginate($perPage);
        return CoverResource::collection($covers);
    }

    public function show($coverId , CoverQuery $query)
    {
        $cover = $query->findOrFail($coverId);
        return new CoverResource($cover);
    }
}
