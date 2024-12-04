<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterUserTable extends Migration
{
    public function up()
    {
        Schema::create('master_user', function (Blueprint $table) {
            $table->string('id_user', 8)->primary();
            $table->string('nama_user', 40);
            $table->string('description', 60);
            $table->text('email');
            $table->string('password');
            $table->string('role', 20);
            $table->text('photo');
            $table->enum('status', ['0', '1']);
            $table->enum('integritas', ['0', '1']);
            $table->enum('read_news', ['0', '1']);
            $table->string('uniq_id', 10)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('master_user');
    }
}
