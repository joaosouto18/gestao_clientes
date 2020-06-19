<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToVendedorsTable extends Migration
{

    public function up()
    {
        Schema::table('vendedors', function (Blueprint $table) {
            $table->unsignedBigInteger('loja_id')->unsigned();
            $table->foreign('loja_id')->references('id')->on('lojas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('vendedors', function (Blueprint $table) {
            //
        });
    }
}
