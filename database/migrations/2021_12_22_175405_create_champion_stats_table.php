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
            $table->float('attackrange', 7 , 4);
            $table->float('movespeed', 7 , 4);
            $table->float('hp', 7 , 4);
            $table->float('hpperlevel', 7 , 4);
            $table->float('mp', 7 , 4);
            $table->float('mpperlevel', 7 , 4);
            $table->float('hpregen', 7 , 4);
            $table->float('hpregenperlevel', 7 , 4);
            $table->float('mpregen', 7 , 4);
            $table->float('mpregenperlevel', 7 , 4);
            $table->float('armor', 7 , 4);
            $table->float('armorperlevel', 7 , 4);
            $table->float('spellblock', 7 , 4);
            $table->float('spellblockperlevel', 7 , 4);
            $table->float('attackdamage', 7 , 4);
            $table->float('attackdamageperlevel', 7 , 4);
            $table->float('attackspeed', 7 , 4);
            $table->float('attackspeedperlevel', 7 , 4);
            $table->float('crit', 7 , 4);
            $table->float('critperlevel', 7 , 4);
            $table->timestamps();

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
