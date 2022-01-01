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
            $table->unsignedBigInteger('id')->primary();
            $table->string('name');
            $table->string('title');
            $table->string('image');
            $table->text('lore');
            $table->string('partype'); // model
            //start info
            $table->unsignedInteger('attack'); 
            $table->unsignedInteger('defense');
            $table->unsignedInteger('magic');
            $table->unsignedInteger('difficulty');
            //end info
            $table->timestamps();

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
