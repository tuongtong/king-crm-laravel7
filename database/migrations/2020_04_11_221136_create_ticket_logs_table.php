<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket_logs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ticket_id');
			$table->integer('staff_id');
			$table->string('content')->nullable();
			$table->timestamps();
			$table->boolean('is_public');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ticket_logs');
	}

}
