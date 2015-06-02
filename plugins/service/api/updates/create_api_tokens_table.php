<?php namespace Cloudservice\Api\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateApiTokensTable extends Migration
{

    public function up()
    {
        Schema::create('api_tokens', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('api_user_id')->unsigned();
            $table->string('token');
            $table->timestamp('expires_on');
            $table->string('client');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('api_tokens');
    }

}