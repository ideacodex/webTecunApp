<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->string('departamento')->nullable();
            $table->string('subDepartamento')->nullable();
            $table->string('puesto')->nullable();
            $table->string('numeroDirecto')->nullable();
            $table->string('celular')->nullable();
            $table->string('extension')->nullable();
            $table->string('asistente')->nullable();
            $table->string('extensionAsistente')->nullable();
            $table->string('correo')->nullable();
            $table->string('pais')->nullable();
            $table->string('empresa')->nullable();
            $table->string('comentarios')->nullable();
            $table->string('mailGeneral')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
