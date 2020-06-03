<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description', 250);
            $table->bigInteger('answer_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description', 100);
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')
                ->references('id')->on('questions');
            $table->bigInteger('answer_id')->nullable();

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
        Schema::dropIfExists('answers');
        Schema::dropIfExists('questions');
    }
}
