<?php namespace Cloudservice\Api\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateApiUsersTable extends Migration
{

    public function up()
    {
        Schema::create('api_users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->index();
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('api_users');
    }

}