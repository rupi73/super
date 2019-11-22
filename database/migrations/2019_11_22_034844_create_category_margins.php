<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryMargins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_margins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('category_id')->unsigned();
            $table->unsignedTinyInteger('role_id');
            $table->unsignedInteger('franchise_id');
            $table->float('float',8,2);
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
        Schema::dropIfExists('category_margins');
    }
}
