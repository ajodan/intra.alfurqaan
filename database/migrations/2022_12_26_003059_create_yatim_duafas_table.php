<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYatimDuafasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yatim_duafas', function (Blueprint $table) {
            $table->id();
            $table->string('nm_lengkap')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('jk', ['L', 'P'])->nullable();
            $table->enum('status', ['Yatim', 'Piatu', 'Yatim Piatu', 'Duafa'])->nullable();
            $table->string('hp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('photo')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('created_by')->nullable();
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
        Schema::dropIfExists('yatim_duafas');
    }
}
