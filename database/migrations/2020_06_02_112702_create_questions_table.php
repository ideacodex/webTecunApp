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
            $table->string('url_image')->nullable();
            $table->string('questionTrue', 250)->nullable();
            $table->string('questionFalse1', 250)->nullable();
            $table->string('questionFalse2', 250)->nullable();
            $table->string('questionFalse3', 250)->nullable();
            $table->bigInteger('answer_id')->nullable();
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
        Schema::dropIfExists('questions');
    }
}
