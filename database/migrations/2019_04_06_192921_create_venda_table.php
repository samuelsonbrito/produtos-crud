<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVENDATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VENDAS', function (Blueprint $table) {
            $table->increments('ID_VENDA');
			$table->string('NUMERO_VENDA');
            $table->integer('VENDEDOR_RESPONSAVEL');
            $table->integer('PRODUTO_ID');
			$table->date('DATA_VENDA')->nullable();
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
        Schema::dropIfExists('VENDAS');
    }
}
