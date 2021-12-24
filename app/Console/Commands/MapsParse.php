<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Map;

class MapsParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maps:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse all maps using the patch json file.';

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
        $map = File::get('public/patch_data/en_GB/map.json');
        if($map){
            $map=json_decode($map);
        }
        dump("Parsing maps for patch ".$map->version." ...");
        $maps=$map->data;

        foreach($maps as $map){
            dump("  Updating ". $map->MapName);
            Map::updateOrCreate([
                'id'            => $map->MapId
            ],[
                'name'          => $map->MapName,
                'image_full'    => $map->image->full,
                'image_sprite'  => $map->image->sprite,
            ]);
        }
        return 0;
    }
}
