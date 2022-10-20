<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = ['path_to_file', 'extra', 'type']; 

    public function waypoints()
    {
        return $this->belongsToMany(Waypoint::class, 'waypoint_media', 'waypoint_id', 'media_id');  

    }
}
