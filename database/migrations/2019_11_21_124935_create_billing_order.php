<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->float('grossAmount',8,2);
            $table->float('margin',8,2);
            $table->float('paidAmount',8,2);
            $table->text('transaction_details');
            $table->string('payment_method');
            $table->enum('order_status',['pending','processing','hold','completed']);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('billing_orders', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
           
        });
        Schema::dropIfExists('billing_orders');
    }
}
