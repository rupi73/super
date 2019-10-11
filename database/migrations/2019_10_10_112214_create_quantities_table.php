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
            $table->tinyInteger('category_id')->unsigned();
            $table->foreign("category_id")->references('id')->on("categories")->onDelete('cascade');

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
        Schema::table('quantities', function (Blueprint $table) {
            $table->dropForeign('quantities_category_id_foreign');
          });
        Schema::dropIfExists('quantities');
    }
}