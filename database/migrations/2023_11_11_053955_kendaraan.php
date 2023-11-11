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
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_model_kendaraan');
            $table->integer('tahun');
            $table->integer('jumlah_penumpang');
            $table->string('manufaktur');
            $table->integer('harga');


            $table->string('bahan_bakar')->nullable();
            $table->integer('luas_bagasi')->nullable();

            $table->string('jumlah_roda')->nullable();
            $table->integer('luas_area_kargo')->nullable();

            $table->string('ukuran_bagasi')->nullable();
            $table->integer('kapasitas_bensin')->nullable();



            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
};
