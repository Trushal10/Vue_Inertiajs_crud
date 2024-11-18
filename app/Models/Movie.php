<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function  genres() {
        return $this->hasMany(Genre::class,"movie_id","id");
    }
}
