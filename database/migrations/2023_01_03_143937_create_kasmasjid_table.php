<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasmasjidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasmasjid', function (Blueprint $table) {
            $table->id();
            $table->dateTime('waktu')->nullable();
            $table->bigInteger('nominal_masuk')->nullable();
            $table->bigInteger('nominal_keluar')->nullable();
            $table->integer('jenistransaksi_id')->nullable();
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
        Schema::dropIfExists('kasmasjid');
    }
}
