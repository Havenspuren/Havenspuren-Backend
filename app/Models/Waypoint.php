<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waypoint extends Model
{
    use HasFactory;
    protected $fillable = ['id','title','short_description','long_description','latitude','longitude','index_of_route', 'visited']; 

    public function scopeSearch($query, array $filters) {

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%' )
            ->orWhere('short_description', 'like', '%' . request('search') . '%')
            ->orWhere('long_description', 'like', '%' . request('search') . '%');
        }

    }

    public function scopeTitleSearch($query, array $filters) {

        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%' );
        }

    }

    //Many to Many
    public function routes()
    {
        return $this->belongsToMany(Route::class);

    }
    
    //Many to Many
    public function medias()
    {
        return $this->belongsToMany(Media::class, 'waypoint_media', 'waypoint_id', 'media_id');  
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
