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
            $table->longText('description');
            $table->longText('skils')->nullable();
            $table->float('salary')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('expiration_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('postulates', function (Blueprint $table) {
            $table->bigImcrements('id');
            $table->text('message')->nullable();
            $table->string('featured_document');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')
                ->references('id')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postulates');
        Schema::dropIfExists('jobs');
    }
}
