<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileIcon extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $guarded = [];

    public function getImagePathAttribute()
    {
        return '/img/profileicon/'.$this->image;
    }
}
