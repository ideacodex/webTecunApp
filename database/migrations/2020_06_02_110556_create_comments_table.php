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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('reactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('comment_post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('comment_id');
            $table->foreign('comment_id')
                ->references('id')->on('comments');
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')
                ->references('id')->on('posts');
        });

        Schema::create('post_reaction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('reaction_id');
            $table->foreign('reaction_id')
                ->references('id')->on('reactions');
            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')
                ->references('id')->on('posts');
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
