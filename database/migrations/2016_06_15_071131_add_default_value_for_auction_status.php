<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultValueForAuctionStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auctions',function (Blueprint $table){
            $table->string('status')->default("started")->change();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('auctions',function (Blueprint $table){
            $table->string('status')->default()->change();
        } );
    }
}
