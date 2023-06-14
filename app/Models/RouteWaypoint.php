<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteWaypoint extends Model
{
    use HasFactory;
    protected $fillable = ['id','route_id', 'waypoint_id', 'index_of_route']; 
    protected $table = 'route_waypoint';
}
