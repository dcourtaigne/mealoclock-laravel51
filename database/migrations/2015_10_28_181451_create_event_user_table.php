<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_user', function(Blueprint $table)
		{
			$table->integer('guest_id')->index('fk_users_has_event_users1_idx')->unsigned();
			$table->integer('event_id')->index('fk_users_has_event_event1_idx')->unsigned();
			$table->enum('status', array('tobeconfirmed','confirmed','rejected','cancelled'))->nullable();
			$table->text('message', 65535);
			$table->primary(['guest_id','event_id']);
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
		Schema::drop('event_user');
	}

}
