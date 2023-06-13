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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_rekam_medis');
            $table->string('name')->nullable;
            $table->integer('nik')->nullable;
            $table->date('tgl_lahir');
            $table->date('tgl_masuk');
            $table->string('penyakit');
            $table->string('email');
            $table->integer('tlp');
            $table->string('alamat');
            $table->string('jenis_kelamin');
            $table->string('jenispenyakit');
            $table->string('dokter');
            $table->string('beratbadan');
            $table->string('tinggibadan');
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
        Schema::dropIfExists('pasiens');
    }
};