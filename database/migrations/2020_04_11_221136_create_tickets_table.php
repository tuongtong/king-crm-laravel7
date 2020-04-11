<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tickets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('client_id');
			$table->string('requestment')->nullable();
			$table->string('model')->nullable();
			$table->string('cpu');
			$table->string('ram');
			$table->string('storage')->nullable();
			$table->string('other')->nullable();
			$table->timestamps();
			$table->string('note')->nullable();
			$table->integer('ticket_status_id')->default(1);
			$table->integer('staff_id');
			$table->integer('price')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tickets');
	}

}
