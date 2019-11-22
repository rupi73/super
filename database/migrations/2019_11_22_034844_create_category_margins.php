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
            $table->unsignedTinyInteger('role_id')->nullable();
            $table->unsignedInteger('franchise_id')->nullable();
            $table->float('marginp',8,2);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('franchise_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_margins', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
            $table->dropForeign(['franchise_id']);
            $table->dropForeign(['client_id']);
        });
        Schema::dropIfExists('category_margins');
    }
}
