<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagesAndPhotosFieldToAuctions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('auctions',function (Blueprint $table){
            $table->integer('image_id')->nullable();
            $table->integer('image_collection_id')->nullable();
            $table->foreign('image_id')->references('id')->on('photos');
            $table->foreign('image_collection_id')->references('id')->on('photo_mapping');
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
            $table->dropForeign('auctions_image_id_foreign');
            $table->dropForeign('auctions_image_collection_id_foreign');
            $table->dropColumn('image_id');
            $table->dropColumn('image_collection_id');
        });
    }
}
