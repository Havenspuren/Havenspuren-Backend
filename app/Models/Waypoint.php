<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waypoint extends Model
{
    use HasFactory;
    protected $fillable = ['title','short_description','long_description','latitude','longitude','index_of_route', 'visited']; 

    
 
    public function routes()
    {
        return $this->belongsToMany(Route::class, 'route_waypoint');

    }
    
    public function medias()
    {
        return $this->belongsToMany(Media::class, 'waypoint_media', 'waypoint_id', 'media_id');  
    }

    public function trophy()
    {
        return $this->hasOne(Trophy::class);
    }

    public function audio()
    {
        return $this->hasOne(Audio::class, 'id');
    }
 
}
