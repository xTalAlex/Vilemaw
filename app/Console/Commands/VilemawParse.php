<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class VilemawParse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vilemaw:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Vilemaw DB using last patch json files.';

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
        $this->call('maps:parse');

        $this->call('runes:parse');

        $this->call('champions:parse');

        $this->call('items:parse');

        $this->call('icons:parse');
        
        return 0;
    }
}
