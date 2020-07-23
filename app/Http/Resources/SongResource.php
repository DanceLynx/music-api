<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class SongResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'pic_url' => Storage::disk('qiniu')->url($this->pic_url),
            'url' => Storage::disk('qiniu')->url($this->url),
            'lyric' => $this->lyric,
            'dt' => $this->dt,
            'cover' => new CoverResource($this->whenLoaded('cover')),
            'singer' => new SingerResource($this->whenLoaded('singer')),
        ];
    }
}
