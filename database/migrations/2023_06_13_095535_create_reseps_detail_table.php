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
        Schema::create('reseps_detail', function (Blueprint $table) {
            $table->id();
            $table->string('no_resep')->nullable();
            $table->integer('id_product')->nullable();
            $table->string('nama_obat')->nullable();
            $table->string('jenis_obat')->nullable();
            $table->string('bentuk_obat')->nullable();
            $table->string('aturan_minum')->nullable();
            $table->integer('price')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('sub_total')->nullable();
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
        Schema::dropIfExists('reseps_detail');
    }
};