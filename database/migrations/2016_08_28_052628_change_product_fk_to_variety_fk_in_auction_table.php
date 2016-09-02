<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeProductFkToVarietyFkInAuctionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auctions',function (Blueprint $table){
            $table->dropForeign('auctions_product_id_foreign');
            $table->renameColumn('product_id','variety_id');
            $table->foreign('variety_id')->references('id')->on('varieties');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auctions',function (Blueprint $table){
            $table->dropForeign('auctions_variety_id_foreign');
            $table->renameColumn('variety_id','product_id');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }
}
