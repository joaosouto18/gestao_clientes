<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo');
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->double('custo')->nullable();
            $table->double('valor_unitario');
            $table->double('valor_revenda')->nullable();
            $table->integer('porcentagem_lucro')->nullable();
            $table->integer('ICMS')->nullable();
            $table->integer('PIS')->nullable();
            $table->integer('Cofins')->nullable();
            $table->integer('IPI')->nullable();
            $table->unsignedBigInteger('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->unsignedBigInteger('grade_id')->unsigned();
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->unsignedBigInteger('colecao_id')->unsigned();
            $table->foreign('colecao_id')->references('id')->on('colecaos')->onDelete('cascade');
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
        Schema::dropIfExists('produtos');
    }
}
