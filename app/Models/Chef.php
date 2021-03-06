<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chef extends Model
{
    use HasFactory,SoftDeletes;
    protected $with = ['image', 'socials'];

    public function image(){
        return $this->morphOne(Image::class, 'object');
    }
    public function socials(){
        return $this->morphMany(SocialMedia::class, 'socials');
    }
}
