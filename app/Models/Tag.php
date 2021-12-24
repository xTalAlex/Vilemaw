<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    protected $guarded = [];

    /**
     * Get the champions for the tag.
     */
    public function champions()
    {
        return $this->belongsToMany(Champion::class,'champion_tag','tag_id','champion_id','name','id');
    }

    /**
     * Get the items for the tag.
     */
    public function items()
    {
        return $this->belongsToMany(Item::class,'item_tag','tag_id','item_id','name','id');
    }
}
