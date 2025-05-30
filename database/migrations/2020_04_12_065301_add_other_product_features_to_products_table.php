<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherProductFeaturesToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('best_selling')->default(0)->after('status');
            $table->boolean('our_product')->default(0)->after('status');
            $table->boolean('we_also_deal')->default(0)->after('status');
            $table->boolean('top_ten')->default(0)->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('best_selling');
            $table->dropColumn('new_arrival');
            $table->dropColumn('new_product');
            $table->dropColumn('best_seller');
            $table->dropColumn('deal_of');
            $table->dropColumn('black_friday_deal');
            $table->dropColumn('deal_of_days');
        });
    }
}
