<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rune extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $guarded = [];

    public function getIconAttribute()
    {
        $nameParsed = str_replace([' ',':','\''],'',ucwords(trim($this->name)));
        return '/img/rune/'.$this->style.'/'.$nameParsed.'/'.$nameParsed.'.png';
    }

    public function getStyleIconAttribute()
    {
        return '/img/rune/'.$this->style.'.png';
    }
}
