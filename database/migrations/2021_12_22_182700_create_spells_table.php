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
            $table->unsignedBigInteger('champion_id');
            $table->char('key', 1);
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->text('tooltip');
            $table->unsignedInteger('maxrank');
            $table->string('resource')->nullable();
            $table->integer('maxammo');
            $table->string('cooldownBurn');
            $table->string('costBurn');
            $table->string('rangeBurn');
            $table->json('effectBurn');
            $table->json('leveltip')->nullable();
            $table->json('vars');
            //datavalues never used
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
        Schema::dropIfExists('spells');
    }
}
