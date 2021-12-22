<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    use HasFactory;

    /**
     * Get the champion that owns the tip.
     */
    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }
}
