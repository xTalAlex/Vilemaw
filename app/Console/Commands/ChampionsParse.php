<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\{ Champion , Partype , Tag};

class ChampionsParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'champions:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse all champions using the patch json file.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $championFull = File::get('public/patch_data/en_GB/championFull.json');
        if($championFull){
            $championFull=json_decode($championFull);
        }
        dump("Parsing champions for patch ".$championFull->version." ...");
        $champions=$championFull->data;

        foreach($champions as $champion){

            $partype = Partype::firstOrCreate([
                'name' => $champion->partype,
            ],[]);

            dump("Updating ".$champion->name);
            $currentChamp=Champion::updateOrCreate([
                'name'            => $champion->id,
            ],[
                'id'           => $champion->key,
                'title'         => $champion->title,
                'image'    => $champion->image->full,
                'lore'          => $champion->lore,
                'partype'       => $partype->name,
                'attack'        => $champion->info->attack,
                'defense'       => $champion->info->defense,
                'magic'         => $champion->info->magic,
                'difficulty'    => $champion->info->difficulty,

            ]
            );
            
            $skins=$champion->skins;
            dump("  Found ". count($skins) ." skins");
            foreach($skins as $skin){
                $currentChamp->skins()->updateOrCreate([
                    'id'      => $skin->id
                ],[
                    'num'     => $skin->num,
                    'name'    => $skin->name,
                    'chromas' => $skin->chromas,
                ]);
            }

            $tags=$champion->tags;
            foreach($tags as $tag){
                Tag::firstOrCreate([
                    'name' => $tag,
                ],[]);
            }
            dump("  ". $currentChamp->name ." is ". collect($tags)->implode(', ') );
            $currentChamp->tags()->sync($tags);

            dump("  Updating enemy and ally tips.");
            $currentChamp->tips()->delete();
            $ally_tips=$champion->allytips;
            foreach($ally_tips as $tip){
                $currentChamp->tips()->create([
                    'enemy'         => 0,
                    'description'   => $tip,
                ]);
            }
            $enemy_tips=$champion->enemytips;
            foreach($enemy_tips as $tip){
                $currentChamp->tips()->create([
                    'enemy'         => 1,
                    'description'   => $tip,
                ]);
            }

            $stats=$champion->stats;
            dump("  Updating stats");
            $currentChamp->stats()->updateOrCreate([],[
                'attackrange'           => $stats->attackrange,  
                'movespeed'             => $stats->movespeed,
                'hp'                    => $stats->hp,
                'hpperlevel'            => $stats->hpperlevel,
                'mp'                    => $stats->mp,
                'mpperlevel'            => $stats->mpperlevel,
                'hpregen'               => $stats->hpregen,
                'hpregenperlevel'       => $stats->hpregenperlevel,
                'mpregen'               => $stats->mpregen,
                'mpregenperlevel'       => $stats->mpregenperlevel,
                'armor'                 => $stats->armor,
                'armorperlevel'         => $stats->armorperlevel,
                'spellblock'            => $stats->spellblock,
                'spellblockperlevel'    => $stats->spellblockperlevel,
                'attackdamage'          => $stats->attackdamage,
                'attackdamageperlevel'  => $stats->attackdamageperlevel,
                'attackspeed'           => $stats->attackspeed,
                'attackspeedperlevel'   => $stats->attackspeedperlevel,
                'crit'                  => $stats->crit,
                'critperlevel'          => $stats->critperlevel,
            ]);

            $passive=$champion->passive;
            dump("  Updating passive skill ".$passive->name);
            $currentChamp->passive()->updateOrCreate([],[
                'name'          => $passive->name,
                'description'   => $passive->description,
                'image'    => $passive->image->full,
            ]);

            $spells=$champion->spells;
            $keys=['q','w','e','r'];
            $currKey=0;
            dump("  Updating spells");
            $currentChamp->spells()->delete();
            foreach($spells as $spell){
                $currentChamp->spells()->updateOrCreate([
                    'id'            =>  $spell->id,
                ],[
                    'key'           =>  $keys[$currKey],
                    'name'          =>  $spell->name,
                    'description'   =>  $spell->description,
                    'image'    =>  $spell->image->full,
                    'tooltip'       =>  $spell->tooltip,
                    'maxrank'       =>  $spell->maxrank,
                    'resource'      =>  $spell->resource ?? null,
                    'maxammo'       =>  $spell->maxammo,
                    'cooldownBurn'  =>  $spell->cooldownBurn,
                    'costBurn'      =>  $spell->costBurn,
                    'rangeBurn'     =>  $spell->rangeBurn,
                    'effectBurn'    =>  json_encode($spell->effectBurn),
                    'leveltip'      =>  json_encode($spell->leveltip ?? null),
                    'vars'          =>  json_encode($spell->vars),
                ]);
                $currKey++;
            }

            $recommended=$champion->recommended;
            if($recommended)
                dump("  This champ has the recommended field!");

        }


        return 0;
    }
}
