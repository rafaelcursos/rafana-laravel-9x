<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function complements()
    {
        return $this->belongsToMany(Complement::class);
    }

}
