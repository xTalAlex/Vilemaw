<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use App\Models\ProfileIcon;

class UpdateIcons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'icon:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all profile icons using the patch json file.';

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
        $profileicon = File::get('public/patch_data/en_GB/profileicon.json');
        if($profileicon){
            $profileicon=json_decode($profileicon);
        }
        dump("Parsing profile icons for patch ".$profileicon->version." ...");
        $icons=$profileicon->data;

        foreach($icons as $icon){
            ProfileIcon::updateOrCreate([
                'id'            => $icon->id
            ],[
                'image_full'    => $icon->image->full,
                'image_sprite'  => $icon->image->sprite,
            ]);
        }

        return 0;
    }
}
