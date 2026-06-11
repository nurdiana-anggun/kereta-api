<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

        public function up(): void {
            Schema::create('jadwals', function (Blueprint $table) {
                $table->id('jadwal_id');
                $table->foreignId('kereta_id')->constrained('keretas', 'kereta_id')->onDelete('cascade');
                $table->string('nama_perjalanan');
                $table->string('stasiun_asal');
                $table->string('stasiun_tujuan');
                $table->date('tanggal_berangkat');
                $table->time('jam_berangkat');
                $table->time('jam_tiba');
                $table->integer('harga_tiket');
                $table->integer('kuota_tersedia');
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
