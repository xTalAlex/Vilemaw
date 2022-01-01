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
            $table->string('image');
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
            $table->unsignedBigInteger('required_champion')->nullable();
            $table->boolean('consumable')->nullable();
            $table->unsignedInteger('depth')->nullable();
            $table->json('effect')->nullable();
            //start rune
            //end rune
            $table->timestamps();

            $table->foreign('required_champion')->references('id')->on('champions')
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
