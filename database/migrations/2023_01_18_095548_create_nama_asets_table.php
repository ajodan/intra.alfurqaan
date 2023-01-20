<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamaAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nama_asets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jenisaset_id')->nullable();
            $table->string('kd_aset')->nullable();
            $table->string('nm_aset')->nullable();
            $table->string('merk')->nullable();
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
        Schema::dropIfExists('nama_asets');
    }
}
