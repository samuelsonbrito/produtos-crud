<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePRODUTOTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PRODUTOS', function (Blueprint $table) {
            $table->increments('ID_PRODUTO');
			$table->string('NOME');
			$table->double('PRECO')->nullable();
			$table->date('DATA_CRIACAO')->nullable();
			$table->date('DATA_ALTERACAO')->nullable();
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
        Schema::dropIfExists('PRODUTOS');
    }
}
