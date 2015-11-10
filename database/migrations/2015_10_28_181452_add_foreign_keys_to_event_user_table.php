<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEventUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('event_user', function(Blueprint $table)
		{
			$table->foreign('event_id', 'fk_users_has_event_event1')->references('id')->on('events')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('guest_id', 'fk_users_has_event_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('event_user', function(Blueprint $table)
		{
			$table->dropForeign('fk_users_has_event_event1');
			$table->dropForeign('fk_users_has_event_users1');
		});
	}

}
