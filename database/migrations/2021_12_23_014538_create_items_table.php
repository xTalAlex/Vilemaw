<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('name');
            $table->string('image_full');
            $table->string('image_sprite');
            $table->string('group')->nullable();
            $table->text('description');
            $table->string('colloq');
            $table->string('plaintext');
            //start gold
            $table->unsignedInteger('gold_base');
            $table->unsignedInteger('gold_total');
            $table->unsignedInteger('gold_sell');
            $table->boolean('purchasable');
            //end gold
            $table->unsignedInteger('stacks')->default(1);
            $table->boolean('inStore')->nullable();//->default(true);
            $table->string('required_champion')->nullable();
            $table->string('required_ally')->nullable();
            $table->boolean('hideFromAll')->nullable();
            $table->boolean('consumed')->nullable();
            $table->boolean('consumeOnFull')->nullable();
            $table->unsignedInteger('depth')->nullable();
            $table->json('effect')->nullable();
            //start rune
            //end rune
            $table->timestamps();

            $table->foreign('required_champion')->references('id')->on('champions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('required_ally')->references('id')->on('champions')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('items', function (Blueprint $table) {
            $table->unsignedBigInteger('special_recipe')->nullable();
            
            $table->foreign('special_recipe')->references('id')->on('items')
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
        Schema::dropIfExists('items');
    }
}
