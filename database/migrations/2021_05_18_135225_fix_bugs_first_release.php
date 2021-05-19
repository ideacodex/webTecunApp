<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixBugsFirstRelease extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('stores', function (Blueprint $table) {
            $table->string('waze')->nullable();
        });

        Schema::table('podcasts', function (Blueprint $table) {
            $table->text('iframe')->nullable();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->text('iframe')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_asotecsa')->defaul(0);
        });

        Schema::create('notification_suggestions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_save')->default(0);
            $table->boolean('is_suggestions')->nullable();
            $table->boolean('is_notification')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users');

            $table->timestamps();
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
        //
        Schema::dropIfExists('notification_suggestions');


        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_asotecsa');//tipos de licencia
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('iframe');//tipos de licencia
        });
        
        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropColumn('iframe');//tipos de licencia
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn('waze');//tipos de licencia
        });
    }
}
