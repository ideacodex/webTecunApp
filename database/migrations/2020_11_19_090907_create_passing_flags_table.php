<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassingFlagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passing_flags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->nullable();
            $table->integer('passed')->default(0);
            $table->integer('questionTrue')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')
                ->references('id')->on('questions');
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
        Schema::dropIfExists('passing_flags');
    }
}
