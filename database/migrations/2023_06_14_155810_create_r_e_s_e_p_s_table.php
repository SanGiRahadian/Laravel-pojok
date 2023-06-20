<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_e_s_e_p_s', function (Blueprint $table) {
            $table->id();
            $table->string('no_resep')->nullable();
            $table->string('nama_pasien')->nullable();
            $table->date('tgl_resep')->nullable();
            $table->integer('name_dokter')->nullable();
            $table->string('no_sip')->nullable();
            $table->integer('penyusun')->nullable();
            $table->integer('total')->nullable();
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
        Schema::dropIfExists('reseps');
    }
};
