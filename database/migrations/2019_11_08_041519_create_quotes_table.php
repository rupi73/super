<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('franchise_id')->unsigned();
            $table->integer('client_id')->unsigned();
            $table->text('estimate');
            $table->timestamps();
            $table->foreign('franchise_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropForeign(['franchise_id']);
            $table->dropForeign(['client_id']);
          });
        Schema::dropIfExists('quotes');
    }
}
