<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductProductLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_product_line', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('product_id');
            $table->unsignedSmallInteger('product_line_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('product_line_id')
                ->references('id')->on('product_lines')
                ->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_product_line');
    }
}
