<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'image',
        'text',
        'like',
        'view',
        'published'
    ];

    public function getPreviewAttribute()
    {
        return mb_substr($this->text, 0, 100);
    }

    public function tags()
    {
//        return $this->belongsToMany(Tag::class);
//        return $this->belongsToMany('App\Models\Tag');
        return $this->belongsToMany('App\Models\Tag', 'post_tags', 'post_id', 'tag_id');

    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
