<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trophy extends Model
{
    use HasFactory;

    public function waypoint(){
        
        return $this->belongsTo(Waypoint::Class, 'waypoint_id');
    }
    
    
}

