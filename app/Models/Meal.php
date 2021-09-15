<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{
    use HasFactory, Translatable, SoftDeletes;

    public $translatedAttributes = ['name', 'desc'];

    public function image(){
        return $this->morphOne(Image::class, 'object');
    }
}

