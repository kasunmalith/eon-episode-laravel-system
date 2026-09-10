<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainSliderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	
	Schema::create('main_slider', function(Blueprint $table)
		{
			$table->increments('id');
			 $table->string('title',255)->nullable();;
			 
			  $table->string('small_title',255)->nullable();;
			  $table->string('read_more_link',255)->nullable();;
			 $table->string('image_link',255)->nullable();;
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
			Schema::drop('main_slider');
	}

}
