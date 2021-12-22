<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * Get the champion that owns the stats.
     */
    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }

    public function cooldown()
    {
        return $this->cooldownBurn;
    }

    public function cost()
    {
        return $this->costBurn;
    }

    public function effect()
    {
        return $this->effectBurn;
    }

    public function range()
    {
        return $this->rangeBurn;
    }
}
