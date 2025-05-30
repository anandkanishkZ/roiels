<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('name');
            $table->string('company')->nullable();
            $table->string('country');
            $table->string('street')->nullable();
            $table->string('street2')->nullable();
            $table->string('city');
            $table->string('state')->nullable();
            $table->integer('phone');
            $table->string('email');
            $table->dateTime('order_date');
            $table->string('order_status');
            $table->string('payment_mode');
            $table->string('payment_key')->nullable();
            $table->integer('total_amount');
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')->on('customers')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
