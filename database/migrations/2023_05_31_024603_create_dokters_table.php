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
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('no_sip')->nullable();
            $table->string('email')->nullable();
            $table->date('tgl_diterima')->nullable();
            $table->string('alamat')->nullable();
            $table->string('spesialisasi')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('dokters');
    }
};
