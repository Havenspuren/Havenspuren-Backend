<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SimpleRoutes extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'routes' => $this->collection->map(function ($data) {
                    return [
                        'id' => $data->id,
                        'name' => $data->name,
                        'description' => $data->description,
                        'path_to_route_image' => $data->path_to_route_image,
                        'expected_time' => $data->expected_time,
                        'waypoint_count' => $data->waypoints->count(),
                        'trophy_count' => $data->trophy_count,
                    ];
                })
            ]
        ];
    }
}
