<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passive extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    /**
     * Get the champion that owns the passive.
     */
    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }

    public function getThumbImageAttribute(){
        return '/img/passive/'.$this->image_full;
    }
}
