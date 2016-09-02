<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBuyerIdToBidderIdInBids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bids',function (Blueprint $table){
            $table->dropForeign('bids_buyer_id_foreign');
            $table->renameColumn('buyer_id','bidder_id');
            $table->foreign('bidder_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bids',function (Blueprint $table){
            $table->dropForeign('bids_bidder_id_foreign');
            $table->renameColumn('bidder_id','buyer_id');
            $table->foreign('buyer_id')->references('id')->on('users');
        });
    }
}
