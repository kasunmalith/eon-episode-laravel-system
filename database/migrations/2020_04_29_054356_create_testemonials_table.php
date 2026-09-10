<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestemonialsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('testemonials', function(Blueprint $table){
			$table->increments('id');
			
			 $table->string('t_img_url',255)->nullable();
			  $table->string('t_date',255)->nullable();
  $table->longText('t_para')->nullable();
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
				Schema::drop('testemonials');
	}

}
