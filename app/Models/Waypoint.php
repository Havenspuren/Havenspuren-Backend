<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waypoint extends Model
{
    use HasFactory;

    public function routes(){
        return $this->hasOneThrou(Route::class, 'route_waypoints');
    }

    public function media(){
        
        return $this->belongsToMany(Media::Class);
    }

    public function trophy(){
        
        return $this->hasOne(Trophy::Class);
    }
}
