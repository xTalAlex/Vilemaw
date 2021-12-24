<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    /**
     * Get the skins for the champion.
     */
    public function skins()
    {
        return $this->hasMany(Skin::class);
    }

    /**
     * Get the tips for the champion.
     */
    public function tips()
    {
        return $this->hasMany(Tip::class);
    }

    /**
     * Get the partype for the champion.
     */
    public function partype()
    {
        return $this->belongsTo(Partype::class);
    }

    /**
     * Get the tags for the champion.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'champion_tag','champion_id','tag_id','id','name');
    }

    /**
     * Get the stats for the champion.
     */
    public function stats()
    {
        return $this->hasOne(ChampionStats::class);
    }

    /**
     * Get the passive for the champion.
     */
    public function passive()
    {
        return $this->hasOne(Passive::class);
    }

    /**
     * Get the spells for the champion.
     */
    public function spells()
    {
        return $this->hasMany(Spell::class);
    }

    // recommended
}
