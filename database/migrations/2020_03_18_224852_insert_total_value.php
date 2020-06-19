<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertTotalValue extends Migration
{

    public function up()
    {
        Schema::table('estoques', function (Blueprint $table) {
            $table->double('valor_total');
        });
    }

    public function down()
    {
        Schema::table('estoques', function (Blueprint $table) {

        });
    }
}
