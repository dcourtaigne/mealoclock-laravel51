<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 100);
			$table->text('details', 65535);
			$table->integer('guests');
			$table->date('date');
			$table->time('time');
			$table->enum('location', array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20'));
			$table->text('address', 65535)->nullable();
			$table->string('image')->nullable();
			$table->integer('user_id')->index('fk_event_users1_idx')->unsigned();
			$table->integer('communitie_id')->index('fk_event_communities1_idx')->unsigned();
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
		Schema::drop('events');
	}

}
