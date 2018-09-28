<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditorsFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editors_followers', function (Blueprint $table) {
            $table->integer('editors_id')->unsigned();
            $table->integer('followers_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('editors_followers', function($table){
            $table->foreign('editors_id')
                                        ->references('id')
                                        ->on('editors')
                                        ->onDelete('cascade');
            $table->foreign('followers_id')
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
        Schema::dropIfExists('editors_followers');
    }
}
