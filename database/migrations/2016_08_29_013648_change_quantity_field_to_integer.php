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
        $sql = "ALTER TABLE \"auctions\" ALTER COLUMN quantity TYPE INTEGER USING quantity::INTEGER ;";
        DB::statement($sql);
/*        Schema::table('auctions',function (Blueprint $table){
//            $table->dropColumn('quantity')->cascade();
            $table->integer('quantity')->change();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = "ALTER TABLE \"auctions\" ALTER COLUMN quantity TYPE VARCHAR(255) USING quantity::VARCHAR ;";
        DB::statement($sql);
/*        Schema::table('auctions',function (Blueprint $table){
//            $table->dropColumn('quantity');
            $table->string('quantity')->change();
        });*/
    }
}
