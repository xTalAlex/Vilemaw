<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChampionStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('champion_stats', function (Blueprint $table) {
            $table->string('champion_id')->primary();
            $table->float('attackrange', 6 , 3);
            $table->float('movespeed', 6 , 3);
            $table->float('hp', 6 , 3);
            $table->float('hpperlevel', 6 , 3);
            $table->float('mp', 6 , 3);
            $table->float('mpperlevel', 6 , 3);
            $table->float('hpregen', 6 , 3);
            $table->float('hpregenperlevel', 6 , 3);
            $table->float('mpregen', 6 , 3);
            $table->float('mpregenperlevel', 6 , 3);
            $table->float('armor', 6 , 3);
            $table->float('armorperlevel', 6 , 3);
            $table->float('spellblock', 6 , 3);
            $table->float('spellblockperlevel', 6 , 3);
            $table->float('attackdamage', 6 , 3);
            $table->float('attackdamageperlevel', 6 , 3);
            $table->float('attackspeed', 6 , 3);
            $table->float('attackspeedperlevel', 6 , 3);
            $table->float('crit', 6 , 3);
            $table->float('critperlevel', 6 , 3);

            $table->foreign('champion_id')->references('id')->on('champions')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('champion_stats');
    }
}
