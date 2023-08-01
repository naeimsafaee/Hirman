<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Festival extends Model
{
    use HasFactory;
    protected $appends = ["short_content","slug"];
    public function getShortContentAttribute()
    {
        return Str::limit($this->content, 90);
    }
    public function getSlugAttribute() {
        return str_replace(' ', '-', $this->title);
    }
}
