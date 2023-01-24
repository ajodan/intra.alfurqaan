<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('jeniskegiatan_id')->nullable();
            $table->bigInteger('mubaligh_id')->nullable();
            $table->string('nm_kegiatan')->nullable();
            $table->string('photo')->nullable();
            $table->date('tgl')->nullable();
            $table->time('waktu')->nullable();
            $table->string('video_url')->nullable();
            $table->enum('keg_kajian',['Y','N'])->nullable();
            $table->string('keterangan')->nullable();
            $table->text('dokumentasi')->nullable();
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
        Schema::dropIfExists('kegiatans');
    }
}
