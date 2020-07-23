<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CoverResource extends JsonResource
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
            'cover_image_url' => Storage::disk('qiniu')->url($this->cover_image_url),
            'description' => $this->description,
            'is_hot' => $this->is_hot,
            'is_recommend' => $this->is_recommend,
            'play_count' => $this->play_count,
            'created_at' => (string) $this->created_at,
            'songs' => SongResource::collection($this->whenLoaded('songs')),
        ];
    }
}
