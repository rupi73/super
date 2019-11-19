<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
            $table->float('gst',8,2)->default(12);
            $table->string('hsn');
        });

        Schema::table('orders', function (Blueprint $table) {
            //
            $table->float('discountp',8,2)->default(0);
            
        });

        Schema::table('order_products', function (Blueprint $table) {
            //
            $table->float('price',8,2);
            $table->float('tax',8,2);
            $table->float('taxp',8,2);
            $table->float('discount',8,2)->default(0);
            $table->float('discountp',8,2)->default(0);
            $table->float('totalPrice',8,2);
            
        });
        Schema::table('order_product_treatments', function (Blueprint $table) {
            //
            $table->string('description')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
            $table->dropColumn(['gst','hsn']);
        });

        Schema::table('orders', function (Blueprint $table) {
            //
            $table->dropColumn(['discountp']);
        });

        Schema::table('order_products', function (Blueprint $table) {
            //
            $table->dropColumn(['price','tax','taxp','discount','discountp','totalPrice']);
        });
        Schema::table('order_product_treatments', function (Blueprint $table) {
            //
            $table->dropColumn(['description'])->nullable();
        });

    }
}
