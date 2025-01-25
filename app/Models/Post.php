<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'body', 'author_id', 'category_id', 'status', 'thumbnail'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            if ($post->thumbnail) {
                Storage::delete($post->thumbnail);
            }
        });
    }
}
