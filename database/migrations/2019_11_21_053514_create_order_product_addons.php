<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductAddons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product_addons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('order_product_id');
            $table->unsignedBigInteger('addon_product_id');
            $table->float('price',8,2);
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('order_product_id')->references('id')->on('order_products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('addon_product_id')->references('id')->on('addon_products')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_product_addons', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['order_product_id']);
            $table->dropForeign(['addon_product_id']);
        });
        Schema::dropIfExists('order_product_addons');
    }
}
