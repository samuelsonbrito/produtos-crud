<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUSUARIOTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('USUARIOS', function (Blueprint $table) {
            $table->increments('ID_USUARIO');
			$table->string('NOME');
			$table->string('SENHA');
            $table->string('CEP');
            $table->string('RUA');
            $table->date('DATA_CRIACAO')->nullable();
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
        Schema::dropIfExists('USUARIOS');
    }
}
