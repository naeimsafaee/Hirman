<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $appends = ["slug"];

    public function actors()
    {
        return $this->belongsToMany(Celeb::class,ActorMovie::class);
    }

    public function writers()
    {
        return $this->belongsToMany(Celeb::class,WriterMovie::class);
    }
    public function directors()
    {
        return $this->belongsToMany(Celeb::class,DirectorMovie::class);
    }
    public function producers()
    {
        return $this->belongsToMany(Celeb::class,ProducerMovie::class);
    }

    public function home()
    {
        return $this->hasOne(Home::class);
    }
    public function getSlugAttribute() {
        return str_replace(' ', '-', $this->title);
    }
}
