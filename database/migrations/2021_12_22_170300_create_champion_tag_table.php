<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChampionTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('champion_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('champion_id');
            $table->string('tag_id');

            $table->foreign('champion_id')->references('id')->on('champions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tag_id')->references('name')->on('tags')
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
        Schema::dropIfExists('champion_tag');
    }
}
