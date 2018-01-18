<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('forums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('filmname');
            $table->string('filmlink');
            $table->text('profile');
            $table->enum('tags', ['action', 'comedy','romance','cartoon','other']);
            $table->timestamps();
            $table->foreign('email')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('forums');
    }
}