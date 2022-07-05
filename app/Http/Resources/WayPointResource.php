<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WayPointResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'short_description' => $this->short_description,
            'long_description' =>$this->long_description,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'index_of_route' => $this->index_of_route,
            'visited' => $this->visited,
            'media' => MediaResource::collection($this->medias) 
        ];
    }
}
