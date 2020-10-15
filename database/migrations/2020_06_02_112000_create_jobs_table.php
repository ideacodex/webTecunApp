<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description');
            $table->text('skils')->nullable();
            $table->float('salary')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->foreing('status_id')
                ->references('id')->on('status');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->references('id')->on('categories');
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
