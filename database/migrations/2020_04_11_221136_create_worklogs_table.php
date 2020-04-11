<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorklogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('worklogs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('staff_id');
			$table->string('content');
			$table->date('date');
			$table->string('session');
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
		Schema::drop('worklogs');
	}

}
