<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRunesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runes', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('style');
            $table->unsignedInteger('slot');//0 is keystone
            $table->string('name');
            $table->text('short_desc')->nullable();
            $table->text('long_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('runes');
    }
}
