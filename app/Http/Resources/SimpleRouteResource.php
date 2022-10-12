<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SimpleRouteResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'path_to_route_image' => $this->path_to_route_image,
            'expected_time' => $this->expected_time,
            'path_to_map_image' => $this->path_to_map_image,
            'path_to_character_image' => $this-> path_to_character_image,
            'waypoints' =>WaypointResource::collection($this->waypoints),

        ];
    }
}
