<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('label');
            $table->string('value');
            $table->timestamps();
            
        });

        Schema::create('size_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('size_id')->unsigned();
            $table->tinyInteger('category_id')->unsigned();
            $table->timestamps();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('size_categories', function (Blueprint $table) {
            $table->dropForeign(['size_id']);
            $table->dropForeign(['category_id']);
          });
        Schema::dropIfExists('size_categories');
        Schema::dropIfExists('sizes');
    }
}
