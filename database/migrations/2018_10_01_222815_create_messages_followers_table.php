<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages_followers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('message_id')->unsigned();;
            $table->integer('follower_id')->unsigned();;
            $table->dateTime('reading_date')->nullable($value = true);
            $table->timestamps();
        });

        Schema::table('messages_followers', function($table){
            $table->foreign('message_id')
                                        ->references('id')
                                        ->on('message')
                                        ->onDelete('cascade');

            $table->foreign('follower_id')
                                        ->references('id')
                                        ->on('users')
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
        Schema::dropIfExists('messages_followers');
    }
}
