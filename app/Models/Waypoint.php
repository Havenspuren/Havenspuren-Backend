<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waypoint extends Model
{
    use HasFactory;
    
    //Many to Many
    public function routes()
    {
        return $this->belongsToMany(Route::class);
    }
    
    //Many to Many
    public function medias()
    {
        return $this->belongsToMany(Media::class, 'media_waypoints', 'waypoint_id', 'media_id');  
    }

    // One to Many
    public function trophy()
    {
        return $this->hasOne(Trophy::class);
    }

    //one to one
    public function audio()
    {
        return $this->hasOne(Audio::class, 'id');
    }
 
}
