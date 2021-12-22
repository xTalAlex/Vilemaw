<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passives', function (Blueprint $table) {
            $table->string('champion_id')->primary();
            $table->string('name');
            $table->text('description');
            $table->string('image_full');
            $table->string('image_sprite');
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
        Schema::dropIfExists('passives');
    }
}
