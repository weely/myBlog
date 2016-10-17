<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens',function (Blueprint $table){
            $table->increments('id');
            $table->integer('user_id');
            $table->string('token');
            $table->string('user_ip');
            $table->timestamp('created_at');
            $table->timestamp('last_access_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tokens');
    }
}
