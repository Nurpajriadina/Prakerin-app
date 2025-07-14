<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pajria_lowongans', function (Blueprint $table) {
            // Tambahkan kolom baru
            $table->string('lokasi_penempatan')->after('deskripsi');
            $table->text('deskripsi_pekerjaan')->after('lokasi_penempatan');
            $table->text('rincian_penugasan')->after('deskripsi_pekerjaan');

            // Hapus kolom lama
            $table->dropColumn(['tanggal_mulai', 'tanggal_selesai']);
        });
    }

    public function down(): void
    {
        Schema::table('pajria_lowongans', function (Blueprint $table) {
            // Kembalikan kolom yang dihapus
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();

            // Hapus kolom yang baru ditambah
            $table->dropColumn(['lokasi_penempatan', 'deskripsi_pekerjaan', 'rincian_penugasan']);
        });
    }
};
