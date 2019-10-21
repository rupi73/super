<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantities', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('label');
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('quantity_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('category_id')->unsigned();
            $table->tinyInteger('quantity_id')->unsigned();
            $table->foreign("quantity_id")->references('id')->on("quantities")->onDelete('cascade');
            $table->foreign("category_id")->references('id')->on("categories")->onDelete('cascade')->onUpdate('cascade');

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
        Schema::table('quantity_categories', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['quantity_id']);
          });          
        Schema::dropIfExists('quantity_categories');
        Schema::dropIfExists('quantities');
    }
}
