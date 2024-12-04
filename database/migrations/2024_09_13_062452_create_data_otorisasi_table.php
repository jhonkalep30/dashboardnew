<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataOtorisasiTable extends Migration
{
    public function up()
    {
        Schema::create('data_otorisasi', function (Blueprint $table) {
            $table->increments('id_otorisasi');
            $table->string('id_user', 8);
            $table->string('id_dashboard', 8);

            // Foreign key constraints (optional, if foreign relationships exist)
            // $table->foreign('id_user')->references('id_user')->on('master_user')->onDelete('cascade');
            // $table->foreign('id_dashboard')->references('id_dashboard')->on('data_dashboard')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_otorisasi');
    }
};
