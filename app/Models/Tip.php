<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeAlly($query)
    {
        return $query->where('enemy', 0);
    }

    public function scopeEnemy($query)
    {
        return $query->where('enemy', 1);
    }

    /**
     * Get the champion that the tip is related to.
     */
    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }
}
