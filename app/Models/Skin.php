<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skin extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $guarded=[];

    /**
     * Get the champion that owns the skin.
     */
    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }

    public function getSplashImageAttribute(){
        return '/img/champion/splash/'.$this->champion->name.'_'.$this->num.'.jpg';
    }
}
