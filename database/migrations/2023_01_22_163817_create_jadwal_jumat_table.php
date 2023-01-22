<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalJumatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_jumat', function (Blueprint $table) {
            $table->id();
            $table->date('tgl')->nullable();
            $table->time('waktu')->nullable();
            $table->string('khotib')->nullable();
            $table->string('imam')->nullable();
            $table->string('mc')->nullable();
            $table->string('muadzin')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('jadwal_jumat');
    }
}
