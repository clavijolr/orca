<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('movimentacaos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('emissao');
            $table->dateTime('vencimento')->nullable();
            $table->dateTime('baixa')->nullable();
            $table->foreignId('empresa_id')->nullable();
            $table->foreignId('conta_id');
            $table->foreignId('grupo_id')->nullable();
            $table->foreignId('categoria_id')->nullable();
            $table->foreignId('subcategoria_id')->nullable();
            $table->foreignId('pessoa_id')->nullable();;
            $table->foreignId('imovel_id')->nullable();
            $table->foreignId('obra_id')->nullable();
            $table->string('tipo',1);
            $table->decimal('valor',9,2);
            $table->string('descricao',75)->nullable();
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
        Schema::dropIfExists('movimentacaos');
    }
}
