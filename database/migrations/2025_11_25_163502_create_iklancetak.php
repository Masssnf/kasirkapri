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
        Schema::create('iklancetak', function (Blueprint $table) {
            $table->id();
            $table->string('kode_iklancetak')->unique();
            $table->string('jenis_iklancetak');
            $table->string('warna_iklancetak');
            $table->integer('baris_iklancetak')->nullable();
            $table->integer('kolom_iklancetak')->nullable();
            $table->integer('harga_iklancetak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iklancetak');
    }
};
