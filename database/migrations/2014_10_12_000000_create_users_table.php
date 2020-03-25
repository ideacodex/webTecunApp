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
            $table->string('description', 250);
            $table->timestamps();
        });

        Schema::create('wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tokens');
            $table->integer('used_tkns');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')
                ->references('id')->on('status');
            $table->timestamps();
            $table->bigInteger('tx_usr_id')->nullable();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('dpi')->unique()->nullable();
            $table->string('name');
            $table->string('lastname', 100)->nullable();
            $table->string('email')->unique();
            $table->integer('phone')->unique();
            $table->string('url_image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('check_terms');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->unsignedInteger('role_id');
            $table->unsignedBigInteger('wallet_id');
            $table->foreign('wallet_id')
                ->references('id')->on('wallets');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')
                ->references('id')->on('status');
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
      Schema::dropIfExists('wallets');
      Schema::dropIfExists('status');        
    }
}
