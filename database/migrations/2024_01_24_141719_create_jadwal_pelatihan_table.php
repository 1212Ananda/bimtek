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
        Schema::create('jadwal_pelatihan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendafataran_id')->constrained('pendaftaran')->onDelete('cascade');
            $table->string('tahap');
            $table->date('tanggal_pelaksanaan');
            $table->string('ruangan');
            $table->string('instruktur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelatihan');
    }
};
