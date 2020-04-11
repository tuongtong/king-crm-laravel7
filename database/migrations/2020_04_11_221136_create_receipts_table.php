<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceiptsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('receipts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('number')->nullable();
			$table->integer('client_id');
			$table->string('content')->nullable();
			$table->bigInteger('amount')->unsigned();
			$table->integer('staff_id');
			$table->timestamps();
			$table->integer('field_id')->default(1);
			$table->integer('branch_id')->default(0);
			$table->softDeletes();
			$table->string('note')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('receipts');
	}

}
