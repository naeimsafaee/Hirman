<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;
    protected $appends = ["short_content","slug"];
    public function getShortContentAttribute()
    {
       return Str::limit($this->content, 150);
    }
    public function getSlugAttribute() {
        return str_replace(' ', '-', $this->title);
    }
}
