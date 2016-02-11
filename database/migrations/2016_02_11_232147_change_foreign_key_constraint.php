<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeForeignKeyConstraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_tweet_id_foreign');
            $table->dropForeign('comments_user_id_foreign');
            $table->foreign('tweet_id')->references('id')->on('tweets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
          $table->dropForeign('comments_tweet_id_foreign');
          $table->dropForeign('comments_user_id_foreign');
            $table->foreign('tweet_id')->references('id')->on('tweets')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('restrict');
        });
    }
}