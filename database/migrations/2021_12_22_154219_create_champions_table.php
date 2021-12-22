<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChampionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('champions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->bigInteger('key')->unique();
            $table->string('name');
            $table->string('title');
            $table->string('image_full');
            $table->string('image_sprite');
            $table->string('blurb');
            $table->text('lore');
            $table->string('partype'); // model
            //start info
            $table->unsignedInteger('attack'); 
            $table->unsignedInteger('defense');
            $table->unsignedInteger('magic');
            $table->unsignedInteger('diufficulty');
            //end info
            
            $table->foreign('partype')->references('name')->on('partypes')
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
        Schema::dropIfExists('champions');
    }
}
