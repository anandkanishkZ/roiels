<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->dateTime('last_login');
            $table->string('address')->nullable();
            $table->string('temporary_address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->boolean('pan')->nullable();
            $table->string('verification_key')->nullable();
            $table->string('reset_token')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('mobile')->nullable();
            $table->string('contact_person_email')->nullable();
            $table->string('contact_person_address')->nullable();
            $table->string('image')->nullable();
            $table->boolean('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
