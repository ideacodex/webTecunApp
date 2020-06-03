<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('first_user');
            $table->foreign('first_user')
                ->references('id')->on('users');
            $table->unsignedBigInteger('second_user');
            $table->foreign('second_user')
                ->references('id')->on('users');
            $table->boolean('read')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message', 250);
            $table->unsignedBigInteger('conversation_id');
            $table->foreign('conversation_id')
                ->references('id')->on('conversations');
            $table->unsignedBigInteger('send_user');
            $table->foreign('send_user')
                ->references('id')->on('users');
            $table->unsignedBigInteger('recive_user');
            $table->foreign('recive_user')
                ->references('id')->on('users');
            $table->boolean('read')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message', 250);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('tx_usr_id')->nullable();
        });

        Schema::create('notifications_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sent_by');
            $table->foreign('sent_by')
                ->references('id')->on('users');
            $table->unsignedBigInteger('sent_to');
            $table->foreign('sent_to')
                ->references('id')->on('users');
            $table->unsignedBigInteger('notification_id');
            $table->foreign('notification_id')
                ->references('id')->on('notifications');
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('tx_usr_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications_details');
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('conversations');}
}
