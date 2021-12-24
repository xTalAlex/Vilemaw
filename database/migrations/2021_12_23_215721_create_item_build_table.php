<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemBuildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_build', function (Blueprint $table) {
            $table->unsignedBigInteger('item_from');
            $table->unsignedBigInteger('item_into');

            $table->foreign('item_from')->references('id')->on('items')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('item_into')->references('id')->on('items')
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
        Schema::dropIfExists('item_build');
    }
}
