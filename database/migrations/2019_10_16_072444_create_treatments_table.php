<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name');
            $table->string('slug');
            if ((DB::connection()->getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') && version_compare(DB::connection()->getPdo()->getAttribute(PDO::ATTR_SERVER_VERSION), '5.7.8', 'ge')) {
                $table->json('settings')->nullable();
            $table->json('quantity_prices')->nullable();
            } else {
            $table->text('settings')->nullable();
            $table->text('quantity_prices')->nullable();
        }
            $table->timestamps();
        });

        Schema::create('treatment_prices', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->tinyInteger('treatment_id')->unsigned();
            $table->tinyInteger('category_id')->unsigned();
            if ((DB::connection()->getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') && version_compare(DB::connection()->getPdo()->getAttribute(PDO::ATTR_SERVER_VERSION), '5.7.8', 'ge')) {
                $table->json('settings');
            $table->json('quantity_prices');
            } else {
            $table->text('settings');
            $table->text('quantity_prices');
        }
            $table->timestamps();
            $table->foreign('treatment_id')->references('id')->on('treatments')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('treatment_prices', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['treatment_id']);
          });
          Schema::dropIfExists('treatment_prices');
        Schema::dropIfExists('treatments');
    }
}
