<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('franchise_id');
            $table->unsignedInteger('client_id');
            $table->float('amount',8,2);
            $table->float('tax',8,2);
            $table->float('discount',8,2);
            $table->float('grossTotal',8,2);
            $table->bigInteger('wp_order_id');
            $table->timestamps();
            $table->foreign('franchise_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::create('order_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('product_id');
            $table->unsignedBigInteger('order_id');
            $table->text('description');
            $table->text('treatments');
            $table->unsignedTinyInteger('quantity_id');
            $table->unsignedTinyInteger('paper_id');
            $table->unsignedTinyInteger('size_id');
              $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('paper_id')->references('id')->on('papers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('quantity_id')->references('id')->on('quantities')->onDelete('cascade')->onUpdate('cascade');

        });
        Schema::create('order_product_treatments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_product_id');
            $table->unsignedTinyInteger('treatment_id');            
            $table->timestamps();
            $table->foreign('order_product_id')->references('id')->on('order_products')->onDelete('cascade');
            $table->foreign('treatment_id')->references('id')->on('treatments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['franchise_id']);
            $table->dropForeign(['client_id']);
        });
        Schema::table('order_products', function (Blueprint $table) {
            $table->dropForeign(['category_id','product_id','paper_id','size_id','quantity_id']);
            
        });
        Schema::table('order_product_treatments', function (Blueprint $table) {
            $table->dropForeign(['order_product_id']);
            $table->dropForeign(['treatment_id']);
        });
        Schema::dropIfExists('order_product_treatments');
        Schema::dropIfExists('order_products');
        Schema::dropIfExists('orders');
    }
}
