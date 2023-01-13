<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMubalighsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mubalighs', function (Blueprint $table) {
            $table->id();
            $table->string('nm_lengkap')->nullable();
            $table->string('email')->nullable();
            $table->string('hp')->nullable();
            $table->enum('jk', ['L', 'P'])->nullable();
            $table->string('alamat')->nullable();
            $table->string('photo')->nullable();
            $table->text('profil')->nullable();
            $table->bigInteger('peranmubaligh_id')->nullable();
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
        Schema::dropIfExists('mubalighs');
    }
}
