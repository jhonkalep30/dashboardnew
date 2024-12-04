<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDashboardTable extends Migration
{
    public function up()
    {
        Schema::create('data_dashboard', function (Blueprint $table) {
            $table->string('id_dashboard', 8)->primary();
            $table->string('title', 40);
            $table->text('link');
            $table->string('deskripsi', 80);
            $table->text('image');
            $table->date('last_update');
            $table->string('year', 4);
            $table->enum('status', ['0', '1']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_dashboard');
    }
};
