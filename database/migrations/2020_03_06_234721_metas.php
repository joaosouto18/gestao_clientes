<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Metas extends Migration
{
    public function up()
    {
        Schema::create('metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->double('valor_total');
            $table->boolean('is_current');
            $table->unsignedBigInteger('loja_id')->unsigned();
            $table->foreign('loja_id')->references('id')->on('lojas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('metas');
    }
}
