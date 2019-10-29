<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('category_id');
            $table->string('name')->unique();
            $table->float('price',8,2)->default(0);
            $table->text('attributes')->nullable();
            $table->integer('order_counts')->default(0);
            $table->text('images')->nullable();
            $table->text('description')->nullable();
            $table->integer('wp_product_id')->default(0);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('product_quantity', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->index();
            $table->unsignedTinyInteger('quantity_id')->index();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('quantity_id')->references('id')->on('quantities')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::create('paper_product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->index();
            $table->unsignedTinyInteger('paper_id')->index();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('paper_id')->references('id')->on('papers')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::create('product_size', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->index();
            $table->unsignedTinyInteger('size_id')->index();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('product_quantity', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['quantity_id']);
          });   
          Schema::table('product_size', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['size_id']);
          });   
          Schema::table('paper_product', function (Blueprint $table) {
            $table->dropForeign(['product_id']);
            $table->dropForeign(['paper_id']);
          });   
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
            
          });
            
          Schema::dropIfExists('product_quantity');Schema::dropIfExists('product_size');Schema::dropIfExists('paper_product');
        Schema::dropIfExists('products');
    }
}
