<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTweetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_tweet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tweet_id')->unsigned();
            $table->foreign('tweet_id')->references('id')->on('tweets')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('tag_id')->unsigned();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::drop('tag_tweet');
    }
}
