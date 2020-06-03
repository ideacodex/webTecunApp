<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message', 250);
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')
                ->references('id')->on('posts');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('reactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message', 250);
            $table->unsignedBigInteger('post_id')->nullable();
            $table->foreign('post_id')
                ->references('id')->on('posts');
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->foreign('comment_id')
                ->references('id')->on('comments');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
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
        Schema::dropIfExists('reactions');
        Schema::dropIfExists('comments');
    }
}
