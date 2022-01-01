<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStat extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = false;

    protected $guarded = [];

    /**
     * Get the items having the stat.
    */
    public function items()
    {
        return $this->belongsToMany(Item::class,'item_item_stat','tag_id','item_id','name','id')->withPivot('value');
    }
}
