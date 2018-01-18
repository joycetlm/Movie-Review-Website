<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('email');
            $table->integer('forum_id');
            $table->text('title');
            $table->text('content');
            $table->timestamps();
            $table->foreign('email')->references('email')->on('users');
            $table->foreign('forum_id')->references('id')->on('forums');
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