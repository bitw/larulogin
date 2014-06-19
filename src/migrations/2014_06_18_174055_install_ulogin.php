<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InstallUlogin extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ulogin', function($table){

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('network', 255);
            $table->string('identity', 255)->unique();
            $table->string('email', 128);
            $table->string('first_name', 128);
            $table->string('last_name', 128);
            $table->string('nickname', 128);
            $table->string('country', 64);
            $table->string('city', 64);
            $table->string('photo', 512);
            $table->string('photo_big', 512);
            $table->string('bdate', 10);
            $table->tinyInteger('sex');
            $table->string('profile', 512);
            $table->string('uid', 32);
            $table->string('access_token', 512);
            $table->string('token_secret', 512);
            $table->boolean('verified_email');

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
