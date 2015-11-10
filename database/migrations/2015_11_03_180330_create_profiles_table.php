<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index('fk_profile_users1_idx')->unsigned();
            $table->foreign('user_id', 'fk_profile_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('cascade');
            $table->string('photo', 255)->nullable();
            $table->string('photo_thumb', 255)->nullable();
            $table->string('intro', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function(Blueprint $table)
        {
           $table->dropForeign('fk_profile_users1');
        });
        Schema::drop('profiles');
    }
}
