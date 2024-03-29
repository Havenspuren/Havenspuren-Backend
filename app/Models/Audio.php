<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;
    protected $fillable = ['path_to_file', 'extra'];

    public function waypoint()
    {
        return $this->belongsTo(Waypoint::class, 'id');
    }
}
