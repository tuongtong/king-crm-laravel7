<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_students', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('course_id');
			$table->integer('client_id');
			$table->integer('deal_rate')->default(0);
			$table->integer('tuition_done')->default(0);
			$table->string('deal_note')->nullable();
			$table->softDeletes();
			$table->timestamps();
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
		Schema::drop('course_students');
	}

}
