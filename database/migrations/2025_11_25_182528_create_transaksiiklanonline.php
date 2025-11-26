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
        Schema::create('transaksiiklanonline', function (Blueprint $table) {
            $table->id();
            $table->string('nofakturonline');
            $table->string('namapemasang');
            $table->string('alamatpemasang');
            $table->string('notelppemasang');
            $table->date('tglmuat');
            $table->string('namasales');
            $table->string('id_iklanonline');
            $table->integer('harga');
            $table->integer('intensif');
            $table->integer('diskon');
            $table->integer('jumlahbayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksiiklanonline');
    }
};
