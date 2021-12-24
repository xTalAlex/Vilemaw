<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $guarded = [];

    /**
     * Get the items for the map.
     */
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }
}
