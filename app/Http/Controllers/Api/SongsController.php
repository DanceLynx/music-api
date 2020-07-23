<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\SongResource;
use App\Queries\SongQuery;
use Exception;
use Illuminate\Http\Request;

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

    public function search(Request $request,SongQuery $query)
    {
        $keywords = $request->keywords;
        if(empty($keywords)) throw new Exception("关键字不能为空");
        $songs = $query->where('name','like',"%$keywords%")->paginate();
        return SongResource::collection($songs);
    }
}
