<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\Rune;

class RunesParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'runes:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse all runes using the patch json file.';

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
        $runesReforged = File::get('public/patch_data/en_GB/runesReforged.json');
        if($runesReforged){
            $runesReforged=json_decode($runesReforged);
        }

        foreach($runesReforged as $style){
            dump("Updating style ". $style->name);
            foreach ($style->slots as $slotId=>$slot) {
                dump(" Slot ". $slotId);
                foreach ($slot->runes as $rune) {
                    dump("  ". $rune->name);
                    $currentRune=Rune::updateOrCreate([
                        'id'        => $rune->id,
                    ], [
                        'style'     => $style->name,
                        'slot'      => $slotId,
                        'name'      => $rune->name,
                        'short_desc'=> $rune->shortDesc ?? null,
                        'long_desc' => $rune->longDesc ?? null,
                    ]);
                }
            }
        }

        return 0;
    }
}
