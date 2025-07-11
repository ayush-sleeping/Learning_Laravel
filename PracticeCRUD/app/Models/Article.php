<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'tag_id',
        'title',
        'slug',
        'content',
        'image',
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
