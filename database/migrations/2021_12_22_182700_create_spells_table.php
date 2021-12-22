<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spells', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->char('key', 1);
            $table->string('name');
            $table->text('description');
            $table->string('image_full');
            $table->string('image_sprite');
            $table->text('tooltip');
            $table->unsignedInteger('maxrank');
            $table->string('cost_type')->nullable();
            $table->string('resource')->nullable();
            $table->integer('maxammo');
            $table->string('cooldownBurn');
            $table->string('costBurn');
            $table->string('rangeBurn');
            $table->json('effectBurn');
            $table->json('leveltip');
            $table->json('vars');
            $table->json('datavalues');
            //datavalues never used
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spells');
    }
}
