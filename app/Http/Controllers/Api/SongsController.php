<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\SongResource;
use App\Queries\SongQuery;

class SongsController extends Controller
{
    public function show($songId,SongQuery $query)
    {
        $song = $query->findOrFail($songId);
        return new SongResource($song);
    }

    public function singerIndex($singerId, SongQuery $query)
    {
        $songs = $query->where('singer_id',$singerId)->paginate();
        return SongResource::collection($songs);
    }
}
