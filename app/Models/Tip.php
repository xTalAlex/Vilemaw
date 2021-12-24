<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the champion that the tip is related to.
     */
    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }
}
