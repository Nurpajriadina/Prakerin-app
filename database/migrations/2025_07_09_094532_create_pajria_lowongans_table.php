<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pajria_lowongans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perusahaan_id'); // FK
            $table->string('judul');
            $table->text('deskripsi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('perusahaan_id')
                  ->references('id')
                  ->on('pajria_perusahaans')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pajria_lowongans');
    }
};
