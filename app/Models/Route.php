<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Route extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','description','path_to_route_image','expected_time','path_to_map_image','path_to_character_image']; 

    public function scopeSearch($query, array $filters) {

        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%' )
            ->orWhere('description', 'like', '%' . request('search') . '%');
        }

    }

    protected function count_waypoints(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->waypoints->count()
        );
    }

    public function waypoints()
    {
        return $this->belongsToMany(Waypoint::class);

    }
}
