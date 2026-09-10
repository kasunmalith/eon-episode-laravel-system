<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCinematographysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('cinematographys', function(Blueprint $table){
			$table->increments('id');
			
			 $table->string('thumb_url',255)->nullable();
			  $table->string('youtube_link',255)->nullable();
  $table->string('title',255)->nullable();
   $table->string('t_couple_name',255)->nullable();
   
   
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
		Schema::drop('cinematographys');
	}

}
