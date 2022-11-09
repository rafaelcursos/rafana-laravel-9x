<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function showcases()
    {
        return $this->belongsToMany(Showcase::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }



}
