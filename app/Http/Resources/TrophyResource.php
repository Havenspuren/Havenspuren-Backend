<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrophyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
            'name' => $this->name,
            'description' => $this->description,
            'path_to_image' => $this->path_to_image,
        ];
    }
}
