<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeQuantityFieldToInteger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //todo chnage quantity to integer
        Schema::table('auctions',function (Blueprint $table){
            $table->dropColumn('quantity')->cascade();
            $table->integer('quantity');
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
            $table->dropColumn('quantity');
            $table->string('quantity');
        });
    }
}
