<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

// File: ..._create_pemesanans_table.php
    public function up(): void {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id('pemesanan_id'); // PENTING: Harus sama dengan yang dirujuk
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('jadwal_id')->constrained('jadwals', 'jadwal_id')->onDelete('cascade');
            $table->date('tanggal_pemesanan');
            $table->integer('jumlah_tiket');
            $table->integer('total_harga');
            $table->string('status_pemesanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
