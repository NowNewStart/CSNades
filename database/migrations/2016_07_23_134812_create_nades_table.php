<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nades', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('map_id')->unsigned();
            $table->foreign('map_id')->references('id')->on('maps');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('type', array('fire','flash','frag','smoke'));
            $table->enum('pop_spot', array('a-site', 'b-site', 'mid', 'other'));
            $table->string('title');
            $table->string('imgur_album');
            $table->string('gfycat');
            $table->string('youtube');
            $table->boolean('is_working');
            $table->string('tags');
            $table->integer('approved_by')->unsigned()->nullable();
            $table->foreign('approved_by')->references('id')->on('users');
            $table->timestamp('approved_at');
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
