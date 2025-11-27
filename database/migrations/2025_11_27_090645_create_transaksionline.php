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
        Schema::create('transaksionline', function (Blueprint $table) {
            $table->id();
            $table->string('nofakturonline');
            $table->date('tanggal_transaksionline');
            $table->string('nama_pemasangonline');
            $table->string('alamat_pemasangonline');
            $table->string('id_iklanonline');
            $table->string('sales_iklanonline');
            $table->date('tanggal_muatiklanonline');
            $table->integer('insentif_transaksionline');
            $table->integer('diskon_transaksionline');
            $table->integer('komisi_transaksionline');
            $table->integer('jumlahbayar_transaksionline');
            $table->integer('piutang_transaksionline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksionline');
    }
};
