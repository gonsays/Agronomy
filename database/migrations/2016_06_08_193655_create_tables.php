<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products',function (Blueprint $table){
            $table->increments('id');
            $table->string("name")->unique();
            $table->string("type");
            $table->string("image");
            $table->timestamps();
        } );

        Schema::create('auctions',function (Blueprint $table){
            $table->increments('id');
            $table->string("name")->unique();
            $table->integer("base_price")->unsigned();
            $table->string('location');
            $table->string('status');
            $table->integer('product_id');
            $table->integer('seller_id');
            $table->date('bidding_end');
            $table->string('quantity');

            $table->timestamps();

            $table->foreign('product_id') ->references('id')->on('products');
            $table->foreign('seller_id') ->references('id')->on('users');
        } );

        Schema::create('bids',function (Blueprint $table){
            $table->increments('id');
            $table->integer('auction_id');
            $table->integer('buyer_id');
            $table->integer('amount');
            $table->integer('quantity');
            $table->string('status');

            $table->timestamps();
            
            $table->foreign('auction_id')->references('id')->on('auctions');
            $table->foreign('buyer_id')->references('id')->on('users');
        } );
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
        Schema::drop('auctions');
        Schema::drop('bids');
    }
}
