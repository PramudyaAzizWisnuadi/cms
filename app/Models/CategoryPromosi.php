<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryPromosi extends Model
{
    protected $table = 'category_promosis';
    protected $fillable = ['name'];
    public function promosi()
    {
        return $this->hasMany(Promosi::class);
    }
}
