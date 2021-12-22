<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partype extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    protected $guarded = [];

    /**
     * Get the champions that owns the partype.
     */
    public function champions()
    {
        return $this->belongsToMany(Champion::class);
    }
}
