<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waypoint extends Model
{
    use HasFactory;

    public function routes()
    {
        return $this->belongsToMany(Route::class, 'route_waypoints');
    }
}
