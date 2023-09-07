<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_kota', function (Blueprint $table) {
            $table->id('id_master_kota');
            $table->bigInteger('id_rajaongkir');
            $table->bigInteger('id_master_provinsi');
            $table->string('nama_kota');
            $table->string('tipe_kota');
            $table->string('kode_pos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_kota');
    }
};
