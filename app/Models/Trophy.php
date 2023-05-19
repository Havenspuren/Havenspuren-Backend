<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trophy extends Model
{
    use HasFactory;
    
    protected $fillable = ['waypoint_id', 'x', 'y', 'name', 'description', 'path_to_image'];


    public function Waypoint()
    {
        return $this->belongsTo(Waypoint::class);
    }
 
}

