<?php

namespace App\Models;

use App\Models\CategoryGalery;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(CategoryGalery::class, 'category_id');
    }
}
