<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNadesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nades', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('map_id')->unsigned();
            $table->foreign('map_id')->references('id')->on('maps');
            $table->integer('pop_spot_id')->unsigned();
            $table->foreign('pop_spot_id')->references('id')->on('pop_spots');
            $table->string('title');
            $table->string('imgur');
            $table->string('youtube');
            $table->boolean('is_working');
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
		Schema::drop('nades');
	}

}
