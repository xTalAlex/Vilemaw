<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChampionStats extends Model
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
}
