<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->string('name');
            $table->string('email');
            $table->integer('phone')->nullable();
            $table->string('image');
            $table->string('rating');
            $table->text('review');
            $table->boolean('status')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')->on('products')
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
        Schema::dropIfExists('reviews');
    }
}
