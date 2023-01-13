<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bibles()
    {
        return $this->belongsTo(Bible::class);
    }
    public function chapter()
    {
        return $this->hasMany(Chapter::class);
    }
}
