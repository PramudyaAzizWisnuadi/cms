<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Promosi extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'start_date', 'end_date', 'category_id'];

    protected $dates = ['start_date', 'end_date'];

    public function category()
    {
        return $this->belongsTo(CategoryPromosi::class);
    }
}
