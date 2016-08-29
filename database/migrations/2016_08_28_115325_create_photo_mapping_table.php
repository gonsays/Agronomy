<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
 * Purpose of this table is to let many other tables like users,
 * products,varieties map to the photos in the database.
 * The attributes defined in this table help an entity to map itself
 * with images in the database.
 *
 * Photo ID: primary key of a photo
 * Group ID: groups a sequence of images together
 *
 * The group ID can be referenced inside another table, so as to
 * map the images to whichever table necessary. Even new tables can
 * map to these images later.
 *
 */

class CreatePhotoMappingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_mapping',function (Blueprint $table){
            $table->increments('id');
            $table->integer('photo_id')->unique();
            $table->integer('group_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photo_mapping');
    }
}
