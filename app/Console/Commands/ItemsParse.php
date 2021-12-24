<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\{Item, ItemStat, Tag};

class ItemsParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'items:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse all items using the patch json file.';

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
        $item = File::get('public/patch_data/en_GB/item.json');
        if($item){
            $item=json_decode($item);
        }
        dump("Fetching item stats ...");
        if($item->basic && $item->basic->stats){
            foreach($item->basic->stats as $stat=>$value){
                ItemStat::updateOrCreate([
                  'name' => $stat  
                ],[

                ]);
            }
        }

        dump("Parsing items for patch ".$item->version." ...");
        $items=$item->data;

        foreach($items as $id=>$item){
            dump("Updating ". $item->name);
            $currentItem=Item::updateOrCreate([
                'id'            =>  $id,
            ],[
                'name'          =>  $item->name,
                'image_full'    =>  $item->image->full,
                'image_sprite'  =>  $item->image->sprite,
                'gold_base'     =>  $item->gold->base,
                'gold_total'    =>  $item->gold->total,
                'gold_sell'     =>  $item->gold->sell,
                'purchasable'   =>  $item->gold->purchasable,
                'group'         =>  $item->group ?? null,
                'description'   =>  $item->description,
                'colloq'        =>  $item->colloq,
                'plaintext'     =>  $item->plaintext,
                'consumed'      =>  $item->consumed ?? null,
                'stacks'        =>  $item->stacks ?? 1,
                'depth'         =>  $item->depth ?? null,
                'consumeOnFull' =>  $item->consumeOnFull ?? null,
                'inStore'       =>  $item->inStore ?? null,
                'hideFromAll'   =>  $item->hideFromAll ?? null,
                'required_champion' => $item->requiredChampion ?? null,
                'required_ally'  =>  $item->requiredAlly ?? null,
            ]);

            dump("  Updating stats");
            $currentItem->stats()->detach();
            foreach($item->stats as $stat=>$value){
                $currentItem->stats()->attach($stat,['value' => $value]);
            }

            $tags=$item->tags;
            foreach($tags as $tag){
                Tag::firstOrCreate([
                    'name' => $tag,
                ],[]);
            }
            dump("  ". $currentItem->name ." has ". collect($tags)->implode(', ') );
            $currentItem->tags()->sync($tags);

            dump("  Updating maps");
            $maps=[];
            foreach($item->maps as $map=>$isAvaiable){
                if($isAvaiable)
                    array_push($maps,$map);
            }
            $currentItem->maps()->sync($maps);

            if($item->rune ?? false){
                dump("  This items has the rune field!");
            }
        }

        dump("Checking for builds ...");
        foreach($items as $id=>$item){
            dump($item->name);
            $currentItem=Item::find($id);

            if ($item->specialRecipe ?? false) {
                dump("  Updating special recipe");
                $currentItem->update([
                    'special_recipe' => $item->specialRecipe
                ]);
            }

            if ($item->into ?? false) {
                dump("  Updating item builds (into) ...");
                $currentItem->buildsInto()->sync($item->into);
            }
        }

        dump("Skipping update item builds (from)");


        return 0;
    }
}
