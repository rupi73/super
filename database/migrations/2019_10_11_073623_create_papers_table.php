<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->tinyInteger('gsm_id')->unsigned();
            if ((DB::connection()->getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') && version_compare(DB::connection()->getPdo()->getAttribute(PDO::ATTR_SERVER_VERSION), '5.7.8', 'ge')) {
                $table->json('settings');
            } else {
            $table->text('settings');            
            }
            $table->timestamps();

            $table->foreign('gsm_id')->references('id')->on('gsms')->onDelete('cascade');
        });
        Schema::create('paper_prices', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->tinyInteger('paper_id')->unsigned();
            $table->tinyInteger('category_id')->unsigned();           
            
            if ((DB::connection()->getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') && version_compare(DB::connection()->getPdo()->getAttribute(PDO::ATTR_SERVER_VERSION), '5.7.8', 'ge')) {
                $table->json('settings');
                $table->json('quantity_prices');
            } else {
            $table->text('settings')->nullable();   
            $table->text('quantity_prices');         
            }
            $table->unique(['category_id','paper_id']);
            $table->timestamps();
            $table->foreign('paper_id')->references('id')->on('papers')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('paper_prices', function (Blueprint $table) {
            $table->dropForeign(['paper_id']);
          });
        Schema::table('papers', function (Blueprint $table) {
            $table->dropForeign(['gsm_id']);
          });

        Schema::dropIfExists('paper_prices');
        Schema::dropIfExists('papers');
    }
}
