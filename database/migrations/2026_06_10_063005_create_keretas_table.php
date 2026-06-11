<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // File: xxxx_create_keretas_table.php
        public function up(): void {
            Schema::create('keretas', function (Blueprint $table) {
                $table->id('kereta_id');
                $table->string('nama_kereta');
                $table->string('kelas');
                $table->string('jenis_kereta');
                $table->integer('kapasitas');
                $table->text('deskripsi')->nullable();
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keretas');
    }
};
