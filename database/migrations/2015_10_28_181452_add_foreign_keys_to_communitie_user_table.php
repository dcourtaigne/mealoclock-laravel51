<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCommunitieUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('communitie_user', function(Blueprint $table)
		{
			$table->foreign('community_id', 'fk_users_has_communities_communities2')->references('id')->on('communities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id', 'fk_users_has_communities_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('communitie_user', function(Blueprint $table)
		{
			$table->dropForeign('fk_users_has_communities_communities2');
			$table->dropForeign('fk_users_has_communities_users1');
		});
	}

}
