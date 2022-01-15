<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $guarded = [];

    public function scopeRift($query)
    {
        return $query->whereHas('maps', fn ($query) => 
                    $query->where('name', 'Summoner\'s Rift')
                );
    }

    /**
     * Get the maps having the item.
     */
    public function maps()
    {
        return $this->belongsToMany(Map::class);
    }
    
    /**
     * Get the tags for the item.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'item_tag','item_id','tag_id','id','name');
    }

    /**
     * Get the items for the item.
     */
    public function buildsInto()
    {
        return $this->belongsToMany(Item::class,'item_build','item_into','item_from');
    }

    /**
     * Get the stats for the item.
     */
    public function stats()
    {
        return $this->belongsToMany(ItemStat::class,'item_item_stat','item_id','item_stat_id','id','name')->withPivot('value');
    }

    /**
     * Get the special recipe for the item.
     */
    public function specialRecipe()
    {
        return $this->belongsTo(Item::class,'special_recipe');
    }

    /**
     * Get the required champion for the item.
     */
    public function requiredChampion()
    {
        return $this->belongsTo(Champion::class,'required_champion');
    }

    /**
     * Get the item for the special recipe.
     */
    public function item()
    {
        return $this->hasOne(Item::class,'special_recipe');
    }

    public function getImagePathAttribute(){
        return '/img/item/'. $this->image;
    }
}
