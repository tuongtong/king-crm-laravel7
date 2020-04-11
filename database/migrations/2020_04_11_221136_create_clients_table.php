<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('phone')->unique('khachhang_sdt_unique');
			$table->date('birthday')->nullable();
			$table->timestamps();
			$table->string('zalo')->nullable();
			$table->string('fburl')->nullable();
			$table->string('major')->nullable();
			$table->string('email')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('clients');
	}

}
