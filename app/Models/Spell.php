<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    /**
     * Get the champion that owns the stats.
     */
    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }

    public function cooldown()
    {
        $cooldowns = explode("/",$this->cooldownBurn);
        if(count($cooldowns)===1){
            $levels = $this->key==='r' ? 3 : 5;
            for( $i=1 ; $i < $levels ; $i++ )
                array_push($cooldowns, $cooldowns[0]);
        }

        return $cooldowns;
    }

    public function cost()
    {
        return $this->costBurn;
    }

    public function effect()
    {
        return $this->effectBurn;
    }

    public function range()
    {
        return $this->rangeBurn;
    }

    public function getThumbImageAttribute(){
        return '/img/spell/'.$this->image_full;
    }
}
