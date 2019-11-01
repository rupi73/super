<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperTreatmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_treatment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('paper_id')->index();
            $table->unsignedTinyInteger('treatment_id')->index();
            $table->timestamps();
            $table->foreign('paper_id')->references('id')->on('papers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('treatment_id')->references('id')->on('treatments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paper_treatment', function (Blueprint $table) {
            $table->dropForeign(['paper_id']);
            $table->dropForeign(['treatment_id']);
          }); 
        Schema::dropIfExists('paper_treatment');
    }
}
