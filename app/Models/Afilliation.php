<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afilliation extends Model
{
    use HasFactory;


    // has many through

    public function posts()
    {
        return $this->hasManyThrough(Post::class, User::class);
    }
}
