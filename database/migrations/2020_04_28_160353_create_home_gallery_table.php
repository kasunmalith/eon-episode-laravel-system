<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeGalleryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('home_gallery', function(Blueprint $table){
			$table->increments('id');
			 $table->string('image_url',255)->nullable();;
			 
			  $table->string('couple_name',255)->nullable();;
			  $table->string('event_type',255)->nullable();;
			
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
		Schema::drop('home_gallery');
	}

}
