<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pajria_perusahaans', function (Blueprint $table) {
            $table->id(); // ID = bigint unsigned auto_increment
            $table->string('nama');
            $table->string('alamat');
            $table->string('email');
            $table->string('no_telepon');
            $table->text('tentang')->nullable(); // jika ingin tambah deskripsi
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pajria_perusahaans');
    }
};
