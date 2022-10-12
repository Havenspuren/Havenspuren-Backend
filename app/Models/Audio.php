<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    public function waypoint()
    {
        return $this->belongsTo(Waypoint::class, 'id');
    }
}
