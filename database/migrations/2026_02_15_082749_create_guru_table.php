<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();

            $table->string('nip')->unique(); // Nomor Induk Pegawai
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);

            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');

            $table->text('alamat');
            $table->string('no_hp');
            $table->string('email')->nullable();
            $table->string('foto')->nullable();

            $table->string('jabatan'); // Guru Mapel / Wali Kelas / BK
            $table->enum('status', ['Aktif', 'Nonaktif'])->default('Aktif');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
