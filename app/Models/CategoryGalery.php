<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryGalery extends Model
{
    protected $guarded = [];

    public function galeries()
    {
        return $this->hasMany(Galery::class, 'category_id');
    }
}
