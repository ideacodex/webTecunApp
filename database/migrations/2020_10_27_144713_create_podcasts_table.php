<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePodcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('podcasts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 100);
            $table->string('description', 250);
            $table->longText('content')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('featured_video')->nullable();
            $table->string('featured_document')->nullable();
            $table->string('featured_audio')->nullable(); 
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')
                ->references('id')->on('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('category_podcast', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')->on('categories');
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
        Schema::dropIfExists('category_podcast');
        Schema::dropIfExists('podcasts');
    }
}
