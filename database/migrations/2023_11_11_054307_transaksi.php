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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();

            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_kendaraan');

            $table->foreign('id_customer')->references('id')->on('customer')->onDelete('cascade');
            $table->foreign('id_kendaraan')->references('id')->on('kendaraan')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
