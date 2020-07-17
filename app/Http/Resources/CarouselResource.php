<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CarouselResource extends JsonResource
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
            'image_url' => Storage::disk('qiniu')->url($this->image_url),
            'target_id' => $this->target_id,
            'target_type' => $this->target_type,
            'created_at' => (string) $this->created_at,
        ];
    }
}
