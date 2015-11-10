<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommunitieUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('communitie_user', function(Blueprint $table)
		{
			$table->integer('user_id')->index('fk_users_has_communities_users1_idx')->unsigned();
			$table->integer('community_id')->index('fk_users_has_communities_communities2_idx')->unsigned();
			$table->primary(['user_id','community_id']);
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
		Schema::drop('communitie_user');
	}

}
