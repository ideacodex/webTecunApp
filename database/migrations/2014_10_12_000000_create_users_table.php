<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('icon', 250);
            $table->string('color', 250);
            $table->timestamps();
        });

        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('points');
            $table->integer('wrong');
            $table->integer('correct');
            $table->timestamps();
            $table->bigInteger('tx_usr_id')->nullable();
            $table->softDeletes();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('dpi')->unique()->nullable();
            $table->string('lastname', 100)->nullable();
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('url_image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('check_terms')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedInteger('role_id')->nullable();
            $table->unsignedBigInteger('score_id')->nullable();
            $table->foreign('score_id')
                ->references('id')->on('scores')
                ->onDelete('cascade');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')
                ->references('id')->on('status');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

      Schema::dropIfExists('users');
      Schema::dropIfExists('scores');
      Schema::dropIfExists('status');   
              
     
    }
}
