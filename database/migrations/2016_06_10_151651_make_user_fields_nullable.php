<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeUserFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->string('address')->nullable()->change();
            $table->string('image')->nullable()->change();
            $table->string('name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @param Blueprint $table
     */
    public function down(Blueprint $table)
    {
        $table->string('address')->change();
        $table->string('image')->change();
        $table->string('name')->change();
    }
}
